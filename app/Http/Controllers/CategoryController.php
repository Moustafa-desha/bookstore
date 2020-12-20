<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    function list(){
        $categories=category::get();
        return view('categories/list',['categories'=>$categories]);
    }

    function addcategory(Request $request)
    {

     $category=new Category();
     $category->name=$request->name;
     $category->save();

     return  redirect('categories/list');


    }
}
