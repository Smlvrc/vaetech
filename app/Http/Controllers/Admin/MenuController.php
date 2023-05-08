<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use http\Env\Request;

class MenuController extends Controller
{
    public function index(){
//        get data
     $menuList=Menu::all();
     return view('admin.menu.index',compact('menuList'));
    }

    public function create(){
    return view('admin.menu.form');
    }

     public function store(\Illuminate\Http\Request $request){
//validiation for exits data
         $validated=$request->validate([
             'title'=>'required|min:3',
             'url'=>'required|url',
         ]);

//    save in db
         Menu::create([
             'title'=>$request->title,
             'url'=>$request->url
         ]);
         return redirect()->route('menu.index');
    }

    public function edit($id){
//id ye gore datani tapmaq ucun
        $menu=Menu::where('id',$id)->firstOrFail();
        return view('admin.menu.form',compact('menu'));
    }
    public function update($id, \Illuminate\Http\Request $request){
        $validated=$request->validate([
            'title'=>'required|min:3',
            'url'=>'required|url',
        ]);
        $menu=Menu::where('id',$id)->firstOrFail();
//        datalari update etmek ucun requestden gelen=evvelki
//$menu->title = $request->title;
//        $menu->url = $request->url;
//        $menu->save();
//(
        $menu->update([
           'title'=>$request->title,
        'url'=> $request-> url
        ]);
        return redirect()->back();
    }
    public function delete($id){
        $menu=Menu::where('id',$id)->firstOrFail();
        $menu->delete();
        return redirect()->back();
    }
}
