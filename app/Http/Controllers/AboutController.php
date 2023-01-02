<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Terms;

class AboutController extends Controller
{
    //
    public function index(){
        $id = 1;
        $about = About::find($id);
        return view('about',['about'=>$about]);
    }

    public function terms(){
        $id=1;
        $terms = Terms::find($id);
        return view('terms',['terms'=>$terms]);
    }
}
