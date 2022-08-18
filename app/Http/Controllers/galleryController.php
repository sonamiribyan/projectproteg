<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;
class galleryController extends Controller
{
   public function store(Request $request){
        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'img'=>'required|image',
        ]);
       $path=$request->file('img')->store('uploads','public');
    $example= gallery::create([
      'title'=>$validated['title'],
      'description'=>$validated['description'],
      'img_url'=>$path
     ]);
        return redirect()->route('gallery');
   }
   public function delete($id){
    $image=gallery::findOrFail($id);
      $image->delete();
      return redirect()->route('gallery');
   }
}
