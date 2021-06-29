<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers() {
        $userList = Users::all();
        return ResponseHelper::success('success', $userList);
    }

    public function getUserDetail(Request $request) {
        $user = Users::find($request->id);
        $user['posts'] = $user->posts;
        if(empty($user)) {
            return ResponseHelper::error('No user found',[], 200);
        }
        return ResponseHelper::success('User Details fetched successfully', $user);
    }

    public function deleteUser() {
        return ResponseHelper::success();
    }

    public function changeStatus(Request $request) {
        $user = Users::where('id',$request->id)->first();
        $uerStatus = $user->status;
        $user->update(['status' => !$uerStatus]);
        return ResponseHelper::success();
    }

    public function updateUser(Request $request) {
        $user = Users::where('id',$request->id)->first();
        $user->update($request->all());
        return ResponseHelper::success();
    }
}


