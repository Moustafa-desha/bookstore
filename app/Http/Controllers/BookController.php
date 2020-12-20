<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
class BookController extends Controller
{
    //
    function books(){
        //select all books
        $books=Book::get();
        return view('list_books',[
            'books'=>$books
        ]);
       // return $books;
        //return "books function";
    }
    
    function create(){
        $categories=Category::get();
        return view('create',[
            'categories'=>$categories
        ]);
    }
    
    function store(Request $request){
        
        
        //validate
         $validator = \Validator::make($request->all(), 
    [ 
     'name' => 'required|max:100|min:3', 
     'desc' => 'required|max:100|min:3', 
     //'image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
]); 
        if($validator->fails()) 
        { 
    return redirect('books/create')->withErrors($validator)->withInput();
        }

        //new book
        $book=new Book();
        $book->name=$request->name;
        $book->desc=$request->desc;
        $book->save();
        $book->categories()->attach($request->categories);
        return redirect('books');
    }
    
    function show($id)
    {
        //select 
        //1
       // $book=Book::where('id','=',$id)->first();
        //2
        $book=Book::find($id);
        
        return view('show',[
            'book'=>$book
        ]);
        
    }
    
    
    function edit($id){
        $book=Book::find($id);
        
        return view('edit',[
            'book'=>$book
        ]);
    }
    
    
    function update(Request $request , $id){
        $book=Book::find($id);
        $book->name=$request->name;
        $book->desc=$request->desc;
        $book->save();
        return redirect('books/show/'.$book->id);
    }
    
    function delete($id)
    {
        $book=Book::find($id);
        
        $book->delete();
        return redirect('books');
    }
    
    
}
