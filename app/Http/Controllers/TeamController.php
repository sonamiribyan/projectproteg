<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\team;
class TeamController extends Controller
{
    public function index(){
        $team=team::All();
        return view('admin.home.team',[
        'team'=>$team
        ]);
    }
    public function store(Request $request){
        $validated=$request->validate([
            'title'=>'required',
            'fb_link'=>'required',
            'twitter_link'=>'required',
            'linkden_link'=>'required',
            'img'=>'required|image',
        ]);

  
       $path=$request->file('img')->store('uploads','public');
    $example= team::create([
      'title'=>$validated['title'],
      'fb_link'=>$validated['fb_link'],
      'twitter_link'=>$validated['fb_link'],
      'linkden_link'=>$validated['fb_link'],
      'img_url'=>$path
     ]);
        return redirect()->route('team');
   }
   public function delete($id){
    $team=team::findOrFail($id);
      $team->delete();
      return redirect()->route('team');
   }
   public function update($id){
    $team=team::findOrFail($id);
   return view('admin.home.teamUpdate',[
    'team'=>$team
   ]);
   }
   public function storeUpdates(Request $request,$id){
    $validated=$request->validate([
        'title'=>'required',
        'fb_link'=>'required',
        'twitter_link'=>'required',
        'linkden_link'=>'required',
        'img'=>'required|image',
    ]);


   $path=$request->file('img')->store('uploads','public');
 $team=team::findOrFail($id);
$team->title=$validated['title'];
$team->img_url=$path;
$team->fb_link=$validated['fb_link'];
$team->twitter_link=$validated['twitter_link'];
$team->linkden_link=$validated['linkden_link'];
$team->save();
return redirect()->route('team');
}
}
