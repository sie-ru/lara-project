<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProfileRequest;
use App\Models\User;

class EditUserController extends Controller
{
    public function __invoke()
    {
        return view('user.edit_profile');
    }

    public function updateUserData(EditProfileRequest $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        $data = $request->validated();

        if($request->has('avatar')) {
            $avatar = str_replace('public/user_avatars', '', $request->file('avatar')->store('public/user_avatars'));
            $data['avatar'] = $avatar;
        }

        if( $user->update($data) ) {
            return redirect(route('user_profile', auth('web')->user()->id))->with(['profile_edited' => 'Profile was edit']);
        }

        return redirect('user_edit_profile')->withErrors(['profile_edit' => 'Profile edit error, please try again']);
    }

    public function changeUserPassword()
    {
        //Todo
    }
}
