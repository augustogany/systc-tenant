<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ProfileController extends Controller
{
      /**
     * Update user profile.
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'avatar' => 'image|mimes:jpeg,jpg,png,gif|max:1024'
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->file('avatar')) {
            $avatar = $request->file('avatar')->store('uploads', 'public');
            $user->avatar = $avatar;
        }

        $user->save();

        return redirect()
            ->back()
            ->with('status', 'perfil actualizado correctamente.');
    }

    /**
     * Delete user avatar
     */
    public function deleteAvatar(Request $request)
    {
        $user = auth()->user();

        if ($user->avatar) {
            File::delete('storage/' . $user->avatar);
            $user->avatar = '';
            $user->save();
        }

        return redirect()
            ->back()
            ->with('status', 'Avatar eliminado correctamente.');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'old_password' => ['required', 'required_with:password',
                function ($attribute, $value, $fail) use ($user) {
                    if (!password_verify($value, $user->password)) {
                        return $fail(__('The current password is incorrect.'));
                    }
                }
            ],
            'password' => 'required|required_with:old_password|string|min:6|confirmed',
        ]);

        $user->password = bcrypt($request->input('password'));

        $user->save();

        return redirect()
            ->back()
            ->with('status', 'Password cambiado correctamente.');
    }
}
