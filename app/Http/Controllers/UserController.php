<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class UserController extends Controller
{
    public function register(Request $request){
        $validate = $request-> validate([
            'name' => 'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:20',
        ]);

        $user = new User();
        $user->name = $validate['name'];
        $user->email = $validate['email'];
        $user->password = bcrypt($validate['password']);
        $user->save();
        Auth::login($user);
    
    return redirect()->route('home');
    
    }

    public function showloginform(){
        return view('auth.login');
    }   
 
 

public function login(Request $request){
    $validate = $request->validate([
        'email' => 'required|email',
        'password'=>'required',
    ]);

    if(Auth::attempt($validate)){
        $request->session()->regenerate();
        return redirect()->route('home');

    }else{
        return redirect()->back()->withErrors(['account not found']);
    }

}


 public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home');

 }

 //  Upload image
 public function UploadImg(Request $request, User $user){
    $request->validate([
        'image'=>'required|image|max:2048'
    ]);
   

    if($request->hasFile('image')){
        $path = $request->file('image')->store('images', 'public');
        $user->image = $path;
        $user->save();

    }
            return redirect()->back()->with('success', 'Image uploaded successfully');


 }
 
    public function deleteUser($id){
        $customers = User::find($id);
        if($customers){
            $customers->delete();
            return redirect()->route('home');

        }else{
            return redirect()->back()->withErrors(['User not found']);
        }
    }
     
}
