<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Auth;
class NoteController extends Controller
{
    //
    function notes(){
        return view('notes/list');

    }

    function addnote(Request $request){
        $note=new Note();
        $note->content=$request->content;
        $note->user_id=Auth::user()->id;
        $note->save();
        return redirect('users/notes');
    }
}
