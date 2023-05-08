<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Support\Str;
use  Symfony\Component\HttpFoundation\Session;


class PageController extends Controller
{

    public function index()
    {
//        pagedeki datalar ucun
        $pages = Page::all();
        return view('admin.page.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.page.form');

    }

    public function store(PageRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->slug);
        $name = Str::uuid()->toString() . '.' . $request->image->extension();

//download pic
        $request->image->storeAs('public', $name);
        $data['image'] = $name;
        Page::create($data);
        return redirect()->route('page.index');
    }

    public function edit(Page $page)
    {
        return view('admin.page.form', compact('page'));
    }

    public function update(Page $page, PageRequest $request)
    {
        $data = $request->validated();

//        sekili insert  etmek ucun
        if ($request->has('image')) {
//        name generation
            $name = Str::uuid()->toString() . '.' . $request->image->extension();
//download pic
            $request->image->storeAs('public', $name);
            $data['image'] = $name;
//        sekil varsa silir deyisdirir
            \Storage::disk('public')->delete($page->image);
        }

        $page->update($data);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $page = Page::where('id',$id)->firstOrFail();
        $page->delete();
        return redirect()->route('page.index');

    }
}
