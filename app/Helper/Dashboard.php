<?php

namespace App\Helper;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\Menu\Entities\Mainmenu;
use Modules\Menu\Entities\Submenu;
use Modules\Post\Entities\Display;
use Modules\Post\Entities\Post;

class Dashboard
{
    public function cardDetail()
    {
        $userCount = User::count();
        $mainMenu = Mainmenu::count();
        $subMenu = Submenu::count();
        $date = date('Y-m-d');
        $fromDate = Carbon::parse($date)->startOfDay();
        $toDate = Carbon::parse($date)->endOfDay();

        $post = Post::select('id', 'view', 'created_at')->whereBetween('created_at', [$fromDate, $toDate])->cursor();

        $cardData['newsCount'] = $post->count();
        $todayview = $post->sum('view');
        $cardData['totalView'] = ReadableHumanNumber($todayview);

        $cardData['userCount'] = $userCount;
        $cardData['category'] = (int) $mainMenu + (int) $subMenu;
        return $cardData;

    }

    public function chartData()
    {

        $post = Post::select('id', 'view', 'created_at', 'created_by')->cursor();


        $date = date('Y-m-d');
        $startOfTheYear = Carbon::parse($date)->startOfYear();
        $endOfTheYear = Carbon::parse($date)->endOfYear();

        $showData = $post->groupBy(function ($val) {
            return Carbon::parse($val->created_at)->format('Y');
        });

        $year = array();
        $news = array();
        $view = array();
        foreach ($showData as $yearkey => $showDataValue) {
            array_push($year, $yearkey);
            array_push($news, $showDataValue->count());
            array_push($view, $showDataValue->sum('view'));
        }

        $chartData['year'] = $year;
        $chartData['news'] = $news;
        $chartData['view'] = $view;


        $currentYearPost = $post->whereBetween('created_at', [$startOfTheYear, $endOfTheYear]);

        $monthShowData = $currentYearPost->groupBy(function ($val) {
            return Carbon::parse($val->created_at)->format('F');
        });
        $monthName = ['January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July ',
            'August',
            'September',
            'October',
            'November',
            'December'];

        $monthView = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $monthNews = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        foreach ($monthShowData as $monthkey => $Monthvalue) {

            $index = array_search($monthkey, $monthName);
            if ($index != false) {

                $totalNews = $Monthvalue->count();
                $totalView = $Monthvalue->sum('view');
                $monthView[$index] = $totalView;
                $monthNews[$index] = $totalNews;

            }
        }

        $chartData['monthWiseNews'] = $monthNews;
        $chartData['monthWiseView'] = $monthView;
        $chartData['monthName'] = $monthName;

        //User Wise Data
        $userName = array();
        $userNewsUpload = array();
        $userData = $post->groupBy(function ($val, $ukye) {
            return $ukye = User::findOrFail($val->created_by)->udtail->name;
        });


        $userData = User::withCount('posts')  // Count the number of posts for each user
        ->with('udtail:name,user_id')
        ->having('posts_count', '>', 0)
        ->get()
        ->map(function($user) {
            return [
                'name' => $user->udtail->name,  // Fetch the user's name from udtail relation
                'post_count' => $user->posts_count  // The count of posts for the user
            ];
        });

    // Prepare the chart data directly
        $chartData['userName'] = $userData->pluck('name');
        $chartData['totalUpload'] = $userData->pluck('post_count');


        //User Wise Data

        //Menu Wise Data
        $displayPost = Display::select('id', 'post_id', 'mainmenu_id', 'submenu_id')->where('status', 1)->cursor();
        $displayData = $displayPost->unique('post_id');

        $displaySubData = $displayPost->filter(function ($item) {
            return !is_null($item->submenu_id);  // Only keep records where submenu_id is not null
        })->unique('post_id');

        $mainMenuName = array();
        $mainMenuTotalNews = array();

        $subMenuName = array();
        $subMenuTotalNews = array();

        $mainMenuData = $displayData->groupBy(function ($mval, $mkye) {
            return $mval->mainmenu->name;
        });


        $subMenuData = $displaySubData->groupBy(function ($sval, $skye) {
            return $sval?->submenu?->name;

        });

        foreach ($mainMenuData as $mainkey => $mainMenuDataValue) {
            array_push($mainMenuName, $mainkey);
            array_push($mainMenuTotalNews, $mainMenuDataValue->count());
        }

        foreach ($subMenuData as $subkey => $subMenuDataValue) {
            array_push($subMenuName, $subkey);
            array_push($subMenuTotalNews, $subMenuDataValue->count());
        }

        $chartData['mainMenu'] = $mainMenuName;
        $chartData['mainMenuNews'] = $mainMenuTotalNews;

        $chartData['subMenu'] = $subMenuName;
        $chartData['subMenuNews'] = $subMenuTotalNews;

        //Menu Wise Data

        //Menu Wise Current Year Data

        $currentYearMainMenuName = array();
        $currentYearMainMenuTotalNews = array();

        $currentYearSubMenuName = array();
        $currentYearSubMenuTotalNews = array();

        $date = date('Y-m-d');
        $startOfTheYear = Carbon::parse($date)->startOfYear();
        $endOfTheYear = Carbon::parse($date)->endOfYear();

        $currentMainMenuYearPost = $displayPost->whereBetween('created_at', [$startOfTheYear, $endOfTheYear]);
        $mainMenuDisplayData = $currentMainMenuYearPost->unique('post_id');

        $currentSubMenuYearPost = $displaySubData->whereBetween('created_at', [$startOfTheYear, $endOfTheYear]);
        $subMenuDisplayData = $currentSubMenuYearPost->unique('post_id');

        $displayDataMainMenu = $mainMenuDisplayData->groupBy(function ($cmval, $cmkye) {
            return $cmkye = $cmval->mainmenu->name;
        });

        foreach ($displayDataMainMenu as $cymainkey => $displayDataMainMenuValue) {
            array_push($currentYearMainMenuName, $cymainkey);
            array_push($currentYearMainMenuTotalNews, $displayDataMainMenuValue->count());
        }

        $displayDataSubMenu = $subMenuDisplayData->groupBy(function ($csubval, $csubkye) {
            return $csubkye = $csubval->mainmenu->name;
        });

        foreach ($displayDataSubMenu as $cysubkey => $displayDataSubMenuValue) {
            array_push($currentYearSubMenuName, $cysubkey);
            array_push($currentYearSubMenuTotalNews, $displayDataSubMenuValue->count());
        }

        $chartData['currentMainMenu'] = $mainMenuName;
        $chartData['currentMainMenuNews'] = $mainMenuTotalNews;

        $chartData['currentSubMenu'] = $subMenuName;
        $chartData['currentSubMenuNews'] = $subMenuTotalNews;

        //Menu Wise Current Year Data

        return $chartData;
    }

}
