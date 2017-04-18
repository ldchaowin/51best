<?php

namespace App\Http\Controllers;

use App\Chart;
use App\Item;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $user_id = Auth::id();
        $charts = Chart::where('user_id',$user_id)->paginate(10);
        $items = Item::where('user_id',$user_id)->paginate(10);

        $likeChartsAll = User::find($user_id)->likeCharts->where('deleted_at',null);

        $paginatorNew = new \Illuminate\Pagination\Paginator($likeChartsAll,5,1);

        return view('profile/profile');


    }


    public function myChart(){

        $user_id = Auth::id();
        $charts = Chart::where('user_id',$user_id)->paginate(10);
        return view('profile/myChart')->with(compact('charts',$charts));
    }

    public function myItem(){

        $user_id = Auth::id();
        $items = Item::where('user_id',$user_id)->paginate(5);

        return view('profile/myItem')->with(compact('items',$items));

    }

    public function myLike(Request $request){

        $user_id = Auth::id();
        $likeChartsAll = User::find($user_id)->likeCharts->where('deleted_at',null);

        $likeChartsNum = $likeChartsAll->count();

        $currentPage = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();

        $perPage =5;

        $currentCharts = $likeChartsAll->slice(($currentPage-1) * $perPage, $perPage)->all();

        $charts= new \Illuminate\Pagination\LengthAwarePaginator($currentCharts,$likeChartsNum,$perPage);


        $charts->setPath($request->url());



        return view('profile/myLike')->with(compact('charts',$charts));

    }

}
