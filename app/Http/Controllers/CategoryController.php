<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories =Category::all();
        return view('category/category')->with(compact('categories'));
    }
}
