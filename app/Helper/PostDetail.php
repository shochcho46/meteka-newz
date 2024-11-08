<?php

namespace App\Helper;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Modules\Menu\Entities\Mainmenu;
use Modules\Menu\Entities\Submenu;
use Modules\Post\Entities\Display;
use Modules\Post\Entities\Epaper;

// use Modules\Post\Entities\Post;
class PostDetail
{
    public function HomePage()
    {
        $today = Carbon::now()->endOfDay();

        $getNewsData = Display::with('post')->where('status', 1)->take(5000)->orderByDesc('id')->get();

        $filtered = $getNewsData->filter(function ($value, $key) use ($today) {

            $publishDate = Carbon::parse($value->post->date);

            return $today >= $publishDate;
        });

        //get All data & asign to variable

        // $getPostData['all'] = Display::with('post')->where('status', 1)->take(1000)->orderByDesc('id')->get();

        $getPostData['all'] = $filtered;

        $data = $getPostData['all'];
        //News Head Line
        $getPostData['newshead'] = $data->where('is_headline', 1)->sortByDesc('updated_at')->first();

        //last Update and Most Read
        $uniquePostId = $data->where('is_headline', 0)->sortByDesc('updated_at')->unique('post_id');

        $getPostData['hedaSection'] = $uniquePostId->take(6);

        $getPostData['recentUpdate'] = $uniquePostId->slice(6, 11);

        $getPostData['scrollPost'] = $uniquePostId->where('is_scroll', 1)->take(10);

        //Most Read
        $read = new Collection();

        $uniquePostId->each(function ($item, $key) use ($read) {
            $item->post->displayid = $item->id;

            $read->push($item->post);

        });
        $getPostData['mostRead'] = $read->sortByDesc('view')->take(9);

        $categoryNews = $getPostData['all'];
        // $categoryNews = $uniquePostId;

        $getPostData['national'] = $categoryNews->where('mainmenu_id', 9)->take(5);

        $getPostData['allcountry'] = $categoryNews->where('mainmenu_id', 10)->unique('post_id')->take(5);
        $getPostData['politics'] = $categoryNews->where('mainmenu_id', 11)->take(5);
        $getPostData['economy'] = $categoryNews->where('mainmenu_id', 12)->take(5);
        $getPostData['international'] = $categoryNews->where('mainmenu_id', 13)->take(5);
        $getPostData['sports'] = $categoryNews->where('mainmenu_id', 14)->take(9);
        $getPostData['entertainment'] = $categoryNews->where('mainmenu_id', 15)->take(6);
        $getPostData['lifestyle'] = $categoryNews->where('mainmenu_id', 16)->take(6);
        $getPostData['other'] = $categoryNews->where('mainmenu_id', 17)->unique('post_id')->take(5);

        // dd($getPostData['allcountry'], $getPostData['other']);

        //sports Sectin cutting
        $getPostData['headsports'] = $getPostData['sports']->take(1);
        $getPostData['subheadsports'] = $getPostData['sports']->slice(1, 4);
        $getPostData['sidesports'] = $getPostData['sports']->slice(5, 9);

        $getPostData['campus'] = $categoryNews->where('submenu_id', 13)->take(8);
        $getPostData['science'] = $categoryNews->where('submenu_id', 14)->take(5);
        $getPostData['history'] = $categoryNews->where('submenu_id', 15)->take(5);
        $getPostData['religion'] = $categoryNews->where('submenu_id', 19)->take(5);
        $getPostData['culture'] = $categoryNews->where('submenu_id', 20)->take(6);
        $getPostData['law'] = $categoryNews->where('submenu_id', 21)->take(10);
        $getPostData['agriculture'] = $categoryNews->where('submenu_id', 22)->take(6);
        $getPostData['job'] = $categoryNews->where('submenu_id', 23)->take(5);

        return $getPostData;

    }

    public function mainMenuStatus()
    {
        $getMainMenuData = Mainmenu::where('status', 1)->get();
        $mainMenuStatus['national'] = $getMainMenuData->contains(9);
        $mainMenuStatus['allcountry'] = $getMainMenuData->contains(10);
        $mainMenuStatus['politics'] = $getMainMenuData->contains(11);
        $mainMenuStatus['economy'] = $getMainMenuData->contains(12);
        $mainMenuStatus['international'] = $getMainMenuData->contains(13);
        $mainMenuStatus['sports'] = $getMainMenuData->contains(14);
        $mainMenuStatus['entertainment'] = $getMainMenuData->contains(15);
        $mainMenuStatus['lifestyle'] = $getMainMenuData->contains(16);
        $mainMenuStatus['other'] = $getMainMenuData->contains(17);

        return $mainMenuStatus;
    }
    public function subMenuStatus()
    {
        $getSubMenuData = Submenu::where('status', 1)->get();
        $subMenuStatus['campus'] = $getSubMenuData->contains(13);
        $subMenuStatus['science'] = $getSubMenuData->contains(14);
        $subMenuStatus['history'] = $getSubMenuData->contains(15);
        $subMenuStatus['religion'] = $getSubMenuData->contains(19);
        $subMenuStatus['culture'] = $getSubMenuData->contains(20);
        $subMenuStatus['law'] = $getSubMenuData->contains(21);
        $subMenuStatus['agriculture'] = $getSubMenuData->contains(22);
        $subMenuStatus['job'] = $getSubMenuData->contains(23);

        return $subMenuStatus;
    }

    public function epaper()
    {

        $getEpaperData = Epaper::take(12)->orderByDesc('id')->get();
        return $getEpaperData;
    }

    public function mainMenuPost($menuId)
    {

        $today = Carbon::now()->endOfDay();

        $getNewsData = Display::with('post')->where('status', 1)->take(500)->orderByDesc('id')->get();

        $filtered = $getNewsData->filter(function ($value, $key) use ($today) {

            $publishDate = Carbon::parse($value->post->date);

            return $today >= $publishDate;
        });

        // $data = Display::with('post')->where('status', 1)->take(500)->orderByDesc('id')->get();

        $data = $filtered;
        $uniquePostId = $data->where('is_headline', 0)->sortByDesc('updated_at')->unique('post_id');
        $getPostData['recentUpdate'] = $uniquePostId->take(9);
        //Most Read
        $read = new Collection();
        $uniquePostId->each(function ($item, $key) use ($read) {
            $item->post->displayid = $item->id;
            $read->push($item->post);
        });
        $getPostData['mostRead'] = $read->sortByDesc('view')->take(9);
        //get menu wise post 9
        $postData = Display::with('post')->where('status', 1)->where('mainmenu_id', $menuId)->take(12)->orderByDesc('id')->get();
        $getPostData['postId'] = $postData->pluck('id');
        $getPostData['firstrow'] = $postData->take(3);
        $getPostData['secondrow'] = $postData->slice(3, 12);
        return $getPostData;

    }

    public function subMenuPost($menuId)
    {

        $today = Carbon::now()->endOfDay();

        $getNewsData = Display::with('post')->where('status', 1)->take(1000)->orderByDesc('id')->get();

        $filtered = $getNewsData->filter(function ($value, $key) use ($today) {

            $publishDate = Carbon::parse($value->post->date);

            return $today >= $publishDate;
        });

        // $data = Display::with('post')->where('status', 1)->take(500)->orderByDesc('id')->get();

        $data = $filtered;
        $uniquePostId = $data->where('is_headline', 0)->sortByDesc('updated_at')->unique('post_id');
        $getPostData['recentUpdate'] = $uniquePostId->take(9);
        //Most Read
        $read = new Collection();
        $uniquePostId->each(function ($item, $key) use ($read) {
            $item->post->displayid = $item->id;
            $read->push($item->post);
        });
        $getPostData['mostRead'] = $read->sortByDesc('view')->take(9);
        //get menu wise post 9
        $postData = Display::with('post')->where('status', 1)->where('submenu_id', $menuId)->take(12)->orderByDesc('id')->get();
        $getPostData['postId'] = $postData->pluck('id');
        $getPostData['firstrow'] = $postData->take(3);
        $getPostData['secondrow'] = $postData->slice(3, 12);
        return $getPostData;

    }

    public function showPost()
    {
        $today = Carbon::now()->endOfDay();

        $getNewsData = Display::with('post')->where('status', 1)->take(500)->orderByDesc('id')->get();

        $filtered = $getNewsData->filter(function ($value, $key) use ($today) {

            $publishDate = Carbon::parse($value->post->date);

            return $today >= $publishDate;
        });

        // $data = Display::with('post')->where('status', 1)->take(500)->orderByDesc('id')->get();

        $data = $filtered;
        $uniquePostId = $data->where('is_headline', 0)->sortByDesc('updated_at')->unique('post_id');
        $getPostData['recentUpdate'] = $uniquePostId->take(9);
        //Most Read
        $read = new Collection();
        $uniquePostId->each(function ($item, $key) use ($read) {
            $item->post->displayid = $item->id;
            $read->push($item->post);
        });
        $getPostData['mostRead'] = $read->sortByDesc('view')->take(9);
        return $getPostData;

    }
}
