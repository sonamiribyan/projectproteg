<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
public function loginUser(Request $request)
{
    $validated=$request->validate([
        'email'=>'required',
        'password'=>'required'
       ]);

    if(Auth::attempt($validated)){
        return redirect()->route('admin');
       }
       else{
        echo "incorrect email or password";
       }
}
public function logout()
{
  if(Auth::check()){
    Auth::logout();
    return redirect()->route('admin');
  }
  else{
    return redirect()->route('admin');
  }
}
public function create(Request $request)
{
$validated=$request->validate([
'name'=>'required',
'email'=>'required|email|unique:users,email',
'password'=>'required'
]);
$user=User::create($validated);
return redirect()->route('admin');
}
public function delete($id)
{
if(Auth::check()){
    $user=User::findOrFail($id);
    $user->delete();
    return redirect()->route('admin');
}
else{
    return redirect()->route('admin');
  }
   }
}


