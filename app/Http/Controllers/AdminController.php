<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\Websiteemail;
use App\Models\Admin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function Adminlogin(){
        return view('admin.login');
    }

    // End method

    public function AdminDashboard(){
        return view('admin.index');
    }

    // End method

    public function AdminloginSubmit(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $check = $request->all();

        $data = [
            'email' => $check['email'],
            'password' => $check['password']
        ];

        if (Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin.dashboard')->with('success','Login Successfully');
        }else{
            return redirect()->route('admin.login')->with('error','Invalide Creadentials ');
        }
    }

    // End method

    public function AdminLogout(Request $request){

        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success','Logout Successfully ');

    }
    // End method

    public function AdminForgetPassword(){

        return view('admin.forget_password');

    }
    // End method

    public function AdminPasswordSubmit(Request $request){

        $request->validate([
            'email' => 'required|email'
        ]);

        $admin_data = Admin::where('email',$request->email)->first();

        if(!$admin_data){
            return redirect()->back()->with('error','email not found');
        }
        $token = hash('sha256',time());
        $admin_data->token = $token;
        $admin_data->update();

        $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);

        $subject = "Reset Password";
        $message = "Please Click on Below link to reset Password <br>";
        $message .="<a href='$reset_link'>Click Here</a>";

        Mail::to($request->email)->send(new Websiteemail($subject , $message));
        return redirect()->back()->with('success','Reset Password link Send on your Email');
    }
    // End method


    public function AdminResetPassword($token , $email){

        $admin_data = Admin::where('email',$email)->where('token',$token)->first();

        if(!$admin_data)
        {
            return redirect()->route('admin.login')->with('error','Invalid Token or email');
        }
        return  view('admin.reset_password',compact('token','email'));
 }
    // End method


    public function AdminResetPasswordSubmit(Request $request){

        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required:same:password'
        ]);

        $admin_data = Admin::where('email',$request->email)->where('token',$request->token)->first();

        if(!$admin_data)
        {
            return redirect()->route('admin.login')->with('error','Invalid Token or email');
        }

        $admin_data->password = Hash::make($request->password);
        $admin_data->token = "";
        $admin_data->update();

        return redirect()->route('admin.login')->with('success','Password Reset Successfully');

 }
    // End method

    public function AdminProfile()
    {
        $id = Auth::guard('admin')->id();
        $profileData = Admin::find($id);
        return view('admin.admin_profile',compact('profileData'));
    }
      // End Method


      public function AdminProfileStore(Request $request){
        $id = Auth::guard('admin')->id();
        $data = Admin::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        $oldPhotoPath = $data->photo;

        if ($request->hasFile('photo')) {
           $file = $request->file('photo');
           $filename = time().'.'.$file->getClientOriginalExtension();
           $file->move(public_path('upload/admin_images'),$filename);
           $data->photo = $filename;

           if ($oldPhotoPath && $oldPhotoPath !== $filename) {
             $this->deleteOldImage($oldPhotoPath);
           }

        }
        $data->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
     // End Method
     private function deleteOldImage(string $oldPhotoPath): void {
        $fullPath = public_path('upload/admin_images/'.$oldPhotoPath);
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
     }
     // End Private Method


     public function AdminChangePassword(){
        $id = Auth::guard('admin')->id();
        $profileData = Admin::find($id);
        return view('admin.admin_change_Password',compact('profileData'));
     }

     // End Method

     public function AdminPasswordUpdate(Request $request){
        $admin = Auth::guard('admin')->user();
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password,$admin->password)) {
            $notification = array(
                'message' => 'Old Password Does not Match!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        /// Update the new password
        Admin::whereId($admin->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

                $notification = array(
                'message' => 'Password Change Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);
     }
      // End Method 
}
