<?php

namespace App\Http\Controllers;

use App\Helper\PostDetail;
// use Illuminate\Support\Carbon;
// use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Modules\Gallery\Entities\Albam;
use Modules\Gallery\Entities\Gallery;
use Modules\Menu\Entities\Mainmenu;
use Modules\Menu\Entities\Submenu;
use Modules\Post\Entities\Display;
use Modules\Post\Entities\Post;
use Share;

class HomeController extends Controller
{
    public function home()
    {
        $postDetail = new PostDetail();

        $getPostDetail = $postDetail->HomePage();
        $mainMenuStatus = $postDetail->mainMenuStatus();
        $subMenuStatus = $postDetail->subMenuStatus();
        $getEpaper = $postDetail->epaper();

        $imageGallery = Albam::where('slider', 1)->orderByDesc('id')->first();

        return view('layout.normal.home', compact('getPostDetail', 'mainMenuStatus', 'subMenuStatus', 'getEpaper', 'imageGallery'));
    }

    public function show(Display $display)
    {

        $postDetail = new PostDetail();
        $postDetailGet = $postDetail->showPost();
        $getPostDetail = $postDetailGet;
        $dataPost = Post::findOrFail($display->post_id);

        $dataPost->increment('view');
        if (!empty($display->submenu_id)) {
            $moreNews = Display::with('post')->where('status', 1)->where('submenu_id', $display->submenu_id)->take(12)->orderByDesc('id')->get();
        } else {
            $moreNews = Display::with('post')->where('status', 1)->where('mainmenu_id', $display->mainmenu_id)->take(12)->orderByDesc('id')->get();
        }
        $fbcomment = $display->is_fbcomment;
        $data = $dataPost;

        $totalView = ReadableHumanNumber((int) $dataPost->view);

        $socialShare = Share::currentPage($data->head)
            ->facebook()
            ->twitter()
            ->reddit()
            ->linkedin()
            ->telegram()
            ->whatsapp();
        return view('layout.normal.post.showpost', compact('data', 'socialShare', 'getPostDetail', 'fbcomment', 'totalView', 'moreNews'));
    }
    public function showNews(Display $display,$slug)
    {
        $postDetail = new PostDetail();
        $postDetailGet = $postDetail->showPost();
        $getPostDetail = $postDetailGet;
        $dataPost = Post::findOrFail($display->post_id);

        $dataPost->increment('view');
        if (!empty($display->submenu_id)) {
            $moreNews = Display::with('post')->where('status', 1)->where('submenu_id', $display->submenu_id)->take(12)->orderByDesc('id')->get();
        } else {
            $moreNews = Display::with('post')->where('status', 1)->where('mainmenu_id', $display->mainmenu_id)->take(12)->orderByDesc('id')->get();
        }
        $fbcomment = $display->is_fbcomment;
        $data = $dataPost;

        $totalView = ReadableHumanNumber((int) $dataPost->view);

        $socialShare = Share::currentPage($data->head)
            ->facebook()
            ->twitter()
            ->reddit()
            ->linkedin()
            ->telegram()
            ->whatsapp();
        return view('layout.normal.post.showpost', compact('data', 'socialShare', 'getPostDetail', 'fbcomment', 'totalView', 'moreNews'));
    }

    public function mainmenu(Request $request, Mainmenu $mainmenu)
    {
        $displyName = $mainmenu->name;
        $postDetail = new PostDetail();
        $postDetailGet = $postDetail->mainMenuPost($mainmenu->id);
        $getPostDetail = $postDetailGet;
        $displayPostId = $postDetailGet['postId'];

        $paginatePost = Display::with('post')->where('status', 1)->where('mainmenu_id', $mainmenu->id)->orderByDesc('id')->whereNotIn('id', $displayPostId)->paginate(10);
        if ($request->ajax()) {
            $view = view('layout.normal.pagepart.loadmore', compact('paginatePost'))->render();

            return response()->json(['html' => $view]);
        }
        return view('layout.normal.post.mainmenu', compact('displyName', 'getPostDetail', 'paginatePost'));
    }

    public function submenu(Request $request, Submenu $submenu)
    {
        $displyName = $submenu->name;
        $mainMenu = $submenu->mainmenu->name;
        $postDetail = new PostDetail();
        $postDetailGet = $postDetail->subMenuPost($submenu->id);
        $getPostDetail = $postDetailGet;
        $displayPostId = $postDetailGet['postId'];

        $paginatePost = Display::with('post')->where('status', 1)->where('submenu_id', $submenu->id)->orderByDesc('id')->whereNotIn('id', $displayPostId)->paginate(10);
        if ($request->ajax()) {
            $view = view('layout.normal.pagepart.loadmore', compact('paginatePost'))->render();

            return response()->json(['html' => $view]);
        }
        return view('layout.normal.post.submenu', compact('displyName', 'getPostDetail', 'paginatePost', 'mainMenu'));
    }

    public function loadarchive()
    {
        $postdate = date('Y-m-d');
        $getPostDetail = Display::with('post')->where('status', 1)->whereDate('created_at', $postdate)->orderByDesc('id')->paginate(20);
        return view('layout.normal.post.archive', compact('getPostDetail', 'postdate'));
    }
    public function archive(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required',
        ]);
        $postdate = $request->date;
        return redirect()->route('home.showarchive', $postdate);
    }

    public function archivePostDiplay($postdate)
    {
        $postdate = $postdate;
        $getPostDetail = Display::with('post')->where('status', 1)->whereDate('created_at', $postdate)->orderByDesc('id')->paginate(20);
        return view('layout.normal.post.archive', compact('getPostDetail', 'postdate'));
    }

    public function loadgallery()
    {
        $postdate = date('Y-m-d');

        $galleyPost = Gallery::with('albam')->whereDate('created_at', $postdate)->orderByDesc('id')->get()->unique('albam_id');

        $albumid = $galleyPost->pluck('albam_id');

        $getAlbumDetail = Albam::whereIn('id', $albumid)->paginate(20);

        return view('layout.normal.post.gallery', compact('getAlbumDetail', 'postdate'));
    }

    public function albumlist(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required',
        ]);
        $postdate = $request->date;
        return redirect()->route('home.displayalbum', $postdate);
    }

    public function displayalbum($postdate)
    {
        $postdate = $postdate;

        $galleyPost = Gallery::with('albam')->whereDate('created_at', $postdate)->orderByDesc('id')->get()->unique('albam_id');

        $albumid = $galleyPost->pluck('albam_id');

        $getAlbumDetail = Albam::whereIn('id', $albumid)->paginate(20);

        return view('layout.normal.post.gallery', compact('getAlbumDetail', 'postdate'));
    }

    public function imagedisplay($albumid)
    {

        $albamList = Albam::orderByDesc('id')->with('galleries')->take(5)->get();
        $getAlbumDetail = Gallery::with('albam')->where('albam_id', $albumid)->orderByDesc('id')->get();
        return view('layout.normal.post.imageview', compact('getAlbumDetail', 'albamList'));
    }

    function print(Post $post) {
        $data = $post;
        return view('layout.normal.post.print', compact('data'));
    }

    public function newsXml()
    {
        $getPostData = Display::with('post')->select('id', 'post_id', 'created_at')->where('status', 1)->take(1000)->orderByDesc('id')->get();
        $displayDatas = $getPostData->unique('post_id');
        return response()->view('layout.normal.xml', compact('displayDatas'))->header('Content-Type', 'text/xml');
    }

    public function about()
    {
        return view('layout.normal.post.about');
    }
    public function privacy()
    {
        return view('layout.normal.post.privacy');
    }
    public function terms()
    {
        return view('layout.normal.post.terms');
    }

}
