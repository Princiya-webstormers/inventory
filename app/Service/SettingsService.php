<?php

namespace App\Service;

use App\Enums\UserType;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SettingsService
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function profileUpdate($request)
    {
        if(auth()->user()->type == UserType::SUPERADMIN){
            $redirect = redirect('/admin/account');
        }
        $currentPassword=auth()->user()->password;
        $newpassword=$request->newpassword;
        $oldpassword=$request->oldpassword;
        $confirmpassword=$request->confirmpassword;
        if($request->newpassword != null){
            if($oldpassword!==null ||  $newpassword!==null || $confirmpassword!==null){
                if (Hash::check($oldpassword, $currentPassword)) {
                    if($newpassword==$confirmpassword){
                        auth()->user()->update(['password'=> Hash::make($request->newpassword)]);
                    }else{
                        session()->flash("error", "New Password and Confirm Password should be same!");
                        return $redirect;
                    }
                }else{
                    session()->flash("error", "Old Password do not Match!");
                    return $redirect;
                }
            }
        }
        // auth()->user()->update(['name'=>$name,'email'=>$email]);
        session()->flash("success", "Profile has been Successfully Updated!");
        return $redirect;
    }

}
