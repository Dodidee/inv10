<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Illuminate\Support\Facades\Hash; // Import the Hash facade


class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        // Log the user out
        Auth::guard('web')->logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token to prevent CSRF attacks
        $request->session()->regenerateToken();

        
        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        ); 

        // Redirect to the homepage
        return redirect('/login')->with($notification);
    }

    public function Profile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));  
    }

    public function EditProfile(){
        
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit',compact('editData'));  
    } //end method

    public function StoreProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;
        

        if($request->file('profile_image')){
            $file = $request->file('profile_image');

            $filename = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_image'] = $filename;

           
           
        }   //end if

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        ); 

        return redirect()->route('admin.profile')->with($notification);
    }   //end method

        public function ChangePassword(){
            return view('admin.admin_change_password');
        }   //end method

        public function UpdatePassword(Request $request){

            $validateData = $request->validate([
                'oldpassword' => 'required',
                'newpassword' => 'required',
                'confirm_password' => 'required|same:newpassword',
            ]);

            
            $hashedPassword = Auth::user()->password;
            if(Hash::check($request->oldpassword, $hashedPassword)){
                if(!Hash::check($request->newpassword, $hashedPassword)){
                    $users = User::find(Auth::id());
                    $users->password = bcrypt($request->newpassword);
                    $users->save();

                   session()->flush('message','Password Change Successfully');
                    return redirect()->back();
                    
            }   //end if
            else{
                session()->flush('message','Old password is not match');
                return redirect()->back();
            }   //end else

            return redirect()->route('admin.profile')->with($notification);
        }   //end method


}
