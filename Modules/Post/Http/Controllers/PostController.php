<?php

namespace Modules\Post\Http\Controllers;

use App\Helper\Geturl;
use App\Helper\Image;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Menu\Entities\Mainmenu;
use Modules\Menu\Entities\Submenu;
use Modules\Post\Entities\Display;
use Modules\Post\Entities\Post;
use Modules\Post\Http\Requests\StorePostRequest;
use Modules\Post\Http\Requests\UpdatePostRequest;
use Modules\Websetting\Events\FacebookPagePost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Image\Manipulations;

// use Modules\Post\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    private $headtitle;
    public function __construct()
    {
        $geturl = new Geturl();

        $this->headtitle['sub_title'] = __('webstring.post');
        $this->headtitle['page_title'] = __('webstring.post');
        $this->headtitle['third_title'] = __('webstring.post');
        $this->headtitle['prefix'] = $geturl->GetUrlPrefix();

    }
    public function index()
    {
        $title = $this->headtitle;
        $theading = __('webstring.post_table');
        $fromDate = date('Y-m-01');
        $fromDate = Carbon::parse($fromDate)->startOfDay();
        $toDate = date('Y-m-d');
        $toDate = Carbon::parse($toDate)->endOfDay();
        $data = Post::whereBetween('created_at', [$fromDate, $toDate])->orderByDesc('id')->cursor();
        return view('post::post.list', compact('data', 'title', 'theading'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

        $title = $this->headtitle;
        $data['main_menu'] = Mainmenu::orderBy('serial', 'asc')->get();
        // $data['post'] = array();
        return view('post::post.create', compact('title', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StorePostRequest $request)
    {

        $getImg = new Image();

        $userid = Auth::id();
        $getdata = $request->validated();
        unset($getdata["mainmenu_id"]);
        $getdata['subhead'] = $request->subhead;
        $getdata['caption'] = $request->caption;
        $getdata['created_by'] = $userid;
        $getdata['author'] = $request->author;

        $getSubmenuId = $request->submenu_id;
        $dummySubmenu = collect();
        if (!empty($getSubmenuId)) {
            $dummySubmenu = Submenu::orderby("serial", "asc")

                ->whereIn('id', $getSubmenuId)
                ->where('status', 1)
                ->get();
        }

        $getdata['imgloc'] = $getImg->DefaultImage();
        $displayPostId = DB::transaction(function () use ($getdata, $request, $dummySubmenu) {

            if (Auth::user()->role_id == 1 ||Auth::user()->role_id == 2 ) {
                $status = 1;
            }
            else
            {
                $status = 0;
            }

            $postId = Post::create($getdata);
            $mediaDisk = config('media-library.disk_name');
            if ($request->hasFile('picturepost')) {
                $this->validateRequestPostpic();
                $postId->clearMediaCollection('postpic');
                $media =  $postId->addMedia($request->picturepost)->toMediaCollection('postpic');
                if ( $mediaDisk == "public") {
                    unlink($media->getPath());
                }
                if ( $mediaDisk == "s3") {
                    Storage::disk('s3')->delete($media->getPath());
                }

            }

            foreach ($request->mainmenu_id as $mkey => $mainvalue) {
                $mainBatchInsert[$mkey]['post_id'] = $postId->id;
                $mainBatchInsert[$mkey]['mainmenu_id'] = $mainvalue;

                $mainBatchInsert[$mkey]['status'] = $status;

            }
            Display::insert($mainBatchInsert);
            if ($dummySubmenu->isNotEmpty()) {

                foreach ($dummySubmenu as $skey => $subvalue) {
                    $subBatchInsert[$skey]['post_id'] = $postId->id;
                    $subBatchInsert[$skey]['mainmenu_id'] = $subvalue->mainmenu_id;
                    $subBatchInsert[$skey]['submenu_id'] = $subvalue->id;
                    $subBatchInsert[$skey]['status'] = $status;

                }
                Display::insert($subBatchInsert);

            }

            $displayPostId = Display::where('post_id', $postId->id)->first();

            return $displayPostId;

        });

        // $url = "http://new.amader-protidin.com/show/5";
        $url = route('home.postshow', $displayPostId->id);

        $fbpage = $request->fbpage;

        if ($fbpage == 1) {
            event(new FacebookPagePost($url));
        }

        return redirect()->route('post.index')->with('success', __('webstring.save_message'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Post $post)
    {
        $title = $this->headtitle;
        return view('post::post.show', compact('title', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Post $post)
    {
        $title = $this->headtitle;
        $postAllMenu = Display::where('post_id', $post->id)->get();
        $data['sub_menu'] = Submenu::orderBy('serial', 'asc')->get();
        $data['post_main_menu'] = $postAllMenu->pluck('mainmenu_id')->unique();

        $data['post_sub_menu'] = $postAllMenu->pluck('submenu_id')->unique();

        $data['main_menu'] = Mainmenu::orderBy('serial', 'asc')->get();
        $data['post'] = $post;
        return view('post::post.edit', compact('title', 'data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $getImg = new Image();

        $postAllMenu = Display::where('post_id', $post->id)->get();
        $destroy_id = $postAllMenu->pluck('id')->unique();

        $userid = Auth::id();
        $getdata = $request->validated();
        unset($getdata["mainmenu_id"]);
        $getdata['subhead'] = $request->subhead;
        $getdata['caption'] = $request->caption;
        $getdata['update_by'] = $userid;
        $getdata['author'] = $request->author;

        $getSubmenuId = $request->submenu_id;
        $dummySubmenu = collect();
        if (!empty($getSubmenuId)) {
            $dummySubmenu = Submenu::orderby("serial", "asc")

                ->whereIn('id', $getSubmenuId)
                ->where('status', 1)
                ->get();
        }

        if ($request->hasFile('postpicupload')) {
            $this->validateRequestUpdatePostpic();
        }

        if ($request->hasFile('picturepost')) {
            $this->validateRequestUpdatePostpic();
        }

        $getdata['imgloc'] = $request->updatepostpic ?? $getImg->DefaultImage();
        DB::transaction(function () use ($getdata, $request, $post, $dummySubmenu, $destroy_id) {

            if (Auth::user()->role_id == 1 ||Auth::user()->role_id == 2 ) {
                $status = 1;
            }
            else
            {
                $status = 0;
            }

            $post->update($getdata);
            $mediaDisk = config('media-library.disk_name');

            if ($request->hasFile('postpicupload')) {
                $this->validateRequestUpdatePostpic();
                $post->clearMediaCollection('postpic');
                $media = $post->addMedia($request->postpicupload)
                ->toMediaCollection('postpic');
                if ( $mediaDisk == "public") {
                    unlink($media->getPath());
                }
                if ( $mediaDisk == "s3") {
                    Storage::disk('s3')->delete($media->getPath());
                }


            }

            if ($request->hasFile('picturepost')) {
                $this->validateRequestUpdatePostpic();
                $post->clearMediaCollection('postpic');
                $media = $post->addMedia($request->picturepost)
                ->toMediaCollection('postpic');
                if ( $mediaDisk == "public") {
                    unlink($media->getPath());
                }
                if ( $mediaDisk == "s3") {
                    Storage::disk('s3')->delete($media->getPath());
                }
            }

            foreach ($request->mainmenu_id as $mkey => $mainvalue) {
                $mainBatchInsert[$mkey]['post_id'] = $post->id;
                $mainBatchInsert[$mkey]['mainmenu_id'] = $mainvalue;

                $mainBatchInsert[$mkey]['status'] = $status;

            }

            Display::destroy($destroy_id);
            Display::insert($mainBatchInsert);
            if ($dummySubmenu->isNotEmpty()) {

                foreach ($dummySubmenu as $skey => $subvalue) {
                    $subBatchInsert[$skey]['post_id'] = $post->id;
                    $subBatchInsert[$skey]['mainmenu_id'] = $subvalue->mainmenu_id;
                    $subBatchInsert[$skey]['submenu_id'] = $subvalue->id;
                    $subBatchInsert[$skey]['status'] = $status;

                }
                Display::insert($subBatchInsert);

            }

        });

        return redirect()->route('post.index')->with('update', __('webstring.update_message'));

    }


    public function destroy(Post $post)
    {
        $postAllMenu = Display::where('post_id', $post->id)->get();
        $destroy_id = $postAllMenu->pluck('id')->unique();
        Display::destroy($destroy_id);
        $post->delete();
        return redirect()->route('post.index')->with('fail', __('webstring.delete_message'));
    }

    public function validateRequestPostpic()
    {
        if (request()->hasFile('picturepost')) {

            $data = request()->validate([
                'picturepost.*' => 'max:6048|dimensions:max_width=1920,max_height=1080',
            ]);

        }
        return $data;

    }

    public function getsubmenu($mainmenu_id)
    {

        $main_menu_array = explode(",", $mainmenu_id);

        $getdata = Submenu::orderby("serial", "asc")

            ->whereIn('mainmenu_id', $main_menu_array)
            ->where('status', 1)
            ->get();

        $groupbydata = $getdata->groupBy('mainmenu_id')->all();

        //group by array mainmenu kye change to main menu name
        foreach ($groupbydata as $key => $groupvalue) {

            $newkey = $groupbydata[$key][0]->mainmenu->name;
            $groupbydata[$newkey] = $groupbydata[$key];
            unset($groupbydata[$key]);
        }
        //group by array mainmenu kye change to main menu name

        $data = $groupbydata;

        return response()->json(
            ['data' => $data]
        );
    }

    public function validateRequestUpdatePostpic()
    {
        if (request()->hasFile('postpicupload')) {

            $data = request()->validate([
                'postpicupload.*' => 'max:6048|dimensions:max_width=1920,max_height=1080',
            ]);

        }

        if (request()->hasFile('picturepost')) {

            $data = request()->validate([
                'picturepost.*' => 'max:6048|dimensions:max_width=1920,max_height=1080',
            ]);

        }
        return $data;

    }

    public function search(Request $request)
    {
        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date',
        ]);

        $title = $this->headtitle;
        $theading = __('webstring.post_table');
        $fromDate = $request->from_date;
        $fromDateCon = Carbon::parse($fromDate)->startOfDay();
        $toDate = $request->to_date;
        $toDateCon = Carbon::parse($toDate)->endOfDay();
        $data = Post::whereBetween('created_at', [$fromDateCon, $toDateCon])->orderByDesc('id')->cursor();
        return view('post::post.list', compact('data', 'title', 'theading', 'fromDate', 'toDate'));

    }


}
