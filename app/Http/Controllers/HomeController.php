<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Product;
use App\Models\Home;
use App\Models\Subscriber;

class HomeController extends Controller
{   
    public function index(){

        $men = Home::where('type','men')->get();
        $women = Home::where('type','women')->get();
        $boys = Home::where('type','boys')->get();
        $girls = Home::where('type','girls')->take(2)->get();
        $womenDresses = Home::where('type','womenDresses')->get();
        $gifts = Home::where('type','gifts')->get();
        $testimonials = Home::where('type','testimonials')->get();
        return view('welcome',['men'=>$men,'women'=>$women,'boys'=>$boys,'girls'=>$girls,'womenDresses'=>$womenDresses,'gifts'=>$gifts,'testimonials'=>$testimonials]);

    }
    public function addcontact(Request $request){
        $request->validate([
            'name'=>'required',
            'subject'=>'required',
            'email'=>'required',
            'phone_number'=>'required',
            'message'=>'required',

        ]);
        $contact = Contact::create([
            'name'=>$request->input('name'),
            'subject'=>$request->input('subject'),
            'email'=>$request->input('email'),
            'phone_number'=>$request->input('phone_number'),
            'message'=>$request->input('message'),

        ]);
        return redirect('/');
    }
    public function addSubscribers(Request $request){
        $request->validate([
            'email'=>'required',

        ]);
        $subscribe = Subscriber::create([
            'email'=>$request->input('email'),
        ]);
        return redirect('/');
    }
}
