<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserProfileSettingsController extends Controller
{
    /**
     * Show User profile settings Page
     */
    public function index()
    {
        $user_data = User::find(Auth::user()->id);



        return view('admin.user-profile-settings', [
            'user_data'     => $user_data,
            'social'        => json_decode($user_data->social, false)
        ]);
    }

    /**
     * User profile update
     */
    public function userProfileUpdate(Request $request)
    {

        // Get user data
        $user_data = User::find(Auth::user()->id);



        $unique_name = $this->fileUpload($request, 'photo', 'media/users/', $user_data->photo);



        // Social profile manage 
        $social = [
            'fb'        => $request->fb,
            'tw'        => $request->tw,
            'lin'        => $request->lin,
            'insta'        => $request->insta,
        ];




        $user_data->name = $request->name;
        $user_data->email = $request->email;
        $user_data->username = $request->username;
        $user_data->cell = $request->cell;
        $user_data->bio = $request->bio;
        $user_data->address = $request->address;
        $user_data->photo = $unique_name;
        $user_data->social =  $social;
        $user_data->update();

        return back();
    }
}
