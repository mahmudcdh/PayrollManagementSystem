<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        $userProfile = auth()->user()->profile;
        return view('user.profile.edit', compact('user', 'userProfile'));
    }

    public function update(Request $request)
    {
        try{

            $userProfile = auth()->user()->profile;

            $userProfile->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Profile updated successfully'
            ], 200);
        }
        catch (Exception $e){
            return response()->json([
                'status' => 'fail',
                'message' => 'Something went wrong!'
            ], 200);
        }
    }
}
