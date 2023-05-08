<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contacts;
use App\Models\Page;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(){
        $about=Page::where('slug','about-page')->first();
        $about2=Page::where('slug','about2')->first();
        $about3=Page::where('slug','about3')->first();
        return view('home',compact('about','about2','about3'));
    }
    public function page($slug){
        $page=Page::where('slug',$slug)->firstOrFail();
        return view('page',compact('page'));
    }
    public function create(ContactRequest $request){
        $contacts=$request->validated();
        Contacts::create($contacts);
        return redirect()->route('contact');

    }
    public function contact(){
        $contacts=Contacts::all();
        return view('contact',compact('contacts'));
    }
}
