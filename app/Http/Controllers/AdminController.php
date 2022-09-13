<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message' => ' Logged Out',
            'alert-type' => 'error',
         );

        return redirect('/login')->with($notification);
    }

    public function Profile(){

        $id =Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile', compact('adminData'));
    }

    public function Edit(){
        $id =Auth::user()->id;
        $editData = User::find($id);
        return view('admin.edit_profile', compact('editData'));
    }

    public function Store(Request $request){
        $id =Auth::user()->id;
        $Data = User::find($id);
        $Data->name = $request->name;
        $Data->username = $request->username;
        $Data->email = $request->email;

        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/admin_img'),$filename);
            $Data['image'] = $filename;
        }
        $Data->save();

        $notification = array(
            'message' => ' Profile Updated Successfully',
            'alert-type' => 'success',
         );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function Change_Password(){

        return view ('admin.change_password');
    }

    public function Update_Password( Request $request){

 $validateData = $request->validate([
    'currentpassword'=>'required',
    'newpassword'=>'required',
    'confirmpassword'=>'required | same:newpassword',
 ]);

    $hashedPassword = Auth::user()->password;
    if(Hash::check($request->currentpassword,$hashedPassword)){

        $users = User::find(Auth::id());
        $users->password = bcrypt($request->newpassword);
        $users->save();

        session()->flash('message','Password Updated Successfully');
        return redirect()->back();
    }
    else{
        session()->flash('message','Password did not Match');
        return redirect()->back();
    }



        // $notification = array(
        //     'message' => 'Password Change Successfully',
        //     'alert-type' => 'success',
        //  );->with($notification)

    }
}
