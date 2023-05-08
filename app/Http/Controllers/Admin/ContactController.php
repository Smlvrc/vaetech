<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contacts;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contacts::all();
        return view('admin.contact.index', compact('contacts'));
    }
    public function destroy($id){
        $contacts=Contacts::where('id',$id)->firstOrFail();
        $contacts->delete();
        return redirect()->back();
    }
}
