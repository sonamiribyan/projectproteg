<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
class AboutController extends Controller
{
public function update($id){
$about=About::findOrFail($id);
return view('admin.home.aboutUpdate',[
    'about'=>$about
]);
 }
    public function restore(Request $request,$id)
    {
        
        $about=About::findOrFail($id);
        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'minDescription'=>'required',
            'img'=>'required|image',
        ]);
        
        $path=$request->file('img')->store('uploads','public');
        $about->title=$validated['title'];
        $about->image=$path;
        $about->description=$validated['description'];
        $about->minDescription=$validated['minDescription'];
        $about->save();
        return redirect()->route('about');
    }

}