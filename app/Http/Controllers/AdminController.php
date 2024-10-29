<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Notepad;
use App\Models\Recode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    
    public function AdminDashboard(Request $request){
        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;

            $recode = Recode::where('user_id',$userid)->orderBy('created_at','DESC')
            ->get()
            ->take(5);
            $note = Notepad::where('user_id',$userid)->orderBy('created_at','DESC')
            ->get()
            ->take(5);
            $document = Document::where('user_id',$userid)->orderBy('created_at','DESC')
            ->get()
            ->take(5);

            $notes=Notepad::where('user_id',$userid)->count();
            $documents = Document::where('user_id',$userid)->count();
            $recodes = Recode::where('user_id',$userid)->count();
        }
        
        return view('admin.index',compact('recode','note','document','recodes','notes','documents'));
    }
    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function AdminLogin(Request $request){
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.admin_login');
    }
   // Display the login form
    
    //profile
    public function AdminProfile(Request $request){
        $data = User::find(Auth::user()->id);
        return view('admin.admin_profile',compact('data'));
    }

    public function AdminProfileUpdate(Request $request){
        $user = request()->validate([
            'email' => 'required|unique:users,email,'. Auth::user()->id
        ]);
        $user = User::find(Auth::user()->id);
        $user->name = trim($request->name);
        $user->username = trim($request->username);
        $user->email = trim($request->email);
        $user->phone = trim($request->phone);
        $user->address = trim($request->address);
        
        /* if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        } */
        if(!empty($request->file('photo'))){
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$user->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $user->photo = $filename;
        }
        //$user->photo = trim($request->photo);

        $user->save();
         return redirect('admin/profile')->with('success', 'Profile Updated Succesfully');
    }

    //Admin Change Password
    public function AdminChangePassword(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('admin.change_password',compact('data'));
    }

    //Update Password
    public function AdminPasswordUpdate(Request $request){

        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        // Match the old password
        if(!Hash::check($request->old_password, auth::user()->password)){

            $notification = array(
                'message' => 'Old Password Does not Match!',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }

        // Update the new password
        User::whereId(auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', 'Profile Updated Succesfully');

    }   // end method
}
