<?php

namespace App\Http\Controllers\Chart;

use Illuminate\Http\Request;

use App\Chart;
use App\User;
use App\Item;
use App\Like;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ShowChartController extends Controller
{
    //
    public function index($chart_id){

        $chart = Chart::find($chart_id);
        $chart_owner = User::find($chart->user_id);
        $items = Item::where('chart_id', $chart_id)
            ->take(10)->get();

        $isLiked = false;

        if(Auth::check()){
            $isLiked = $this->isLikedByMe($chart_id);
        }

        return view('chart/chart')
            ->with(compact('chart'))
            ->with(compact('chart_owner'))
            ->with(compact('items'))
            ->with(compact('isLiked'));
    }


    /**
     * 是否已收藏
     */
    public function isLikedByMe($id)
    {
        if(Auth::check()){
            if (Like::where('user_id',Auth::id())->where('chart_id',$id)->exists()){
            return true;
          }
        }
        return false;
    }

    /**
     * 收藏/取消收藏 榜单
     */
    public function postLikeChart(Request $request){


        if(Auth::check()){

            $existing_like = Like::withTrashed()->where('chart_id',$request->id)->where('user_id',Auth::id())->first();

            if(is_null($existing_like)){
                Like::create([
                    'chart_id'=>$request->id,
                    'user_id'=>Auth::id()
                ]);

                return response()->json([
                    'result'=>true
                ]);
            }else{
                if(is_null($existing_like->deleted_at)){
                    $existing_like->delete();
                    return response()->json([
                        'result'=>false
                    ]);
                }else{
                    $existing_like->restore();
                    return response()->json([
                        'result'=>true
                    ]);
                }
            }

        }else{

            if ($request->ajax()) {
                return response('Unauthorized', 401);
            } else {
                return redirect()->guest('/login');
            }

        }


    }

    /**
     * 展示添加元素页面
    */

    public function addItemShow($chart_id){

            $chart = Chart::find($chart_id);
            return view('chart/addItem')
                ->with(compact('chart'));
    }



    /**
     * 添加元素
    */
    public function  addItem(Request $request,$chart_id){
        $newItem = new Item;
        $newItem->name = $request->name;
        $newItem->chart_id =$chart_id;
        $newItem->user_id = Auth::id();
        $newItem->introduction = $request->intro;
        $newItem->ranking = Item::where('chart_id',$chart_id)->count() + 1;
        $newItem->agreed_num = 0;
        $newItem->comment_num = 0;

        $newItem->save();

        return response()->json([
            'url'=>'/chart/'.$chart_id,
        ]);
    }

    /**
     * 显示元素详情
    */
    public function itemDetail($chart_id, $item_id){
        $chart = Chart::find($chart_id);
        $item = Item::find($item_id);

        return view('chart/item')
            ->with(compact('chart'))
            ->with(compact('item'));
    }



}
