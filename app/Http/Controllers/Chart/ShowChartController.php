<?php

namespace App\Http\Controllers\Chart;

use Illuminate\Http\Request;

use App\Chart;
use App\User;
use App\Item;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShowChartController extends Controller
{
    //
    public function index($chart_id){

        $chart = Chart::find($chart_id);
        $chart_owner = User::find($chart->user_id);

        $items = Item::where('chart_id', $chart_id)
            ->take(10)->get();
        return view('chart/chart')
            ->with(compact('chart'))
            ->with(compact('chart_owner'))
            ->with(compact('items'));

    }

}
