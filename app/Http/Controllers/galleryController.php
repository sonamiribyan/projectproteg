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
        
        return redirect()->route('admin/gallery');

   }
}
