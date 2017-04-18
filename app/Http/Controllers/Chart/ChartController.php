<?php

namespace App\Http\Controllers\Chart;

use App\Chart;
use App\Item;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;



class ChartController extends Controller
{


    protected $redirectTo = '/home';


    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('chart/new_chart');
    }

    /**
     * 创建新表单
    */

    public function postNewChart(Request $request){
        //新建并保存榜单

        $chart = new Chart;

        $chart->name = $request->name;
        $chart->user_id = $request->user_id;
        $chart->introduction = $request->intro;
        $chart->item_num = $request->item_num;
        $chart->appreciated_num = 0;
        $chart->clicked_num =0;

        $chart->save();

        //找到这个榜单插入元素

        $items = $request->items;

        foreach ($items as $item){
            $newItem = new Item;

            $newItem->chart_id = $chart->id;
            $newItem->user_id=$chart->user_id;
            $newItem->name = $item['name'];
            $newItem->introduction = $item['intro'];
            $newItem->ranking = $item['ranking'];
            $newItem->agreed_num = 0;
            $newItem->comment_num = 0;

            $newItem->save();
        }

        return response()->json([
            'url'=>'/home',
        ]);


    }




}

