<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
class ContactController extends Controller
{
    public function update($id)
    {
    $contact=contact::findOrFail($id);
    return view('admin.home.contactUpdate',[
        'contact'=>$contact
    ]);
    }
    public function restore(Request $request,$id)
    {
        $validated=$request->validate([
            'office'=>'required',
            'phone'=>'required|numeric|min:10',
            'email'=>'required|email',
        ]);

        $contact=contact::findOrFail($id);
        $contact->email=$validated['email'];
        $contact->phone=$validated['phone'];
        $contact->office=$validated['office'];
        $contact->save();
        return redirect()->route('contact');    
    }
}
