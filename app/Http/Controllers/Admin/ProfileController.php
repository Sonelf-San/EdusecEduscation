<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    function getProfile()
    {
        $user = Auth('admin')->user();
        return view('admin.profile', compact('user'));
    }

    /**
     * @desc Handle Update profile update form submission
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editProfile(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        $user = Auth('admin')->user();
        $user->name = $request['name'];
        $user->save();

        $request->session()->flash('success', __('Mise à jour du profil réussie'));
        return redirect()->back();
    }

    /**
     * @desc Change admin password
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        $messages = [
            'current_password.required' => __('Veuillez entrer l\'ancien mot de passe'),
            'password.required'         => __('Veuillez entrer le mot de passe'),
        ];

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password'         => 'required|min:6|confirmed',
        ], $messages);

        // Ensure that user's password matches password from the form
        $validator->after(function ($validator) use ($request) {
            $current_password = Auth('admin')->user()->password;
            if (!Hash::check($request['current_password'], $current_password)) {
                $validator->errors()->add('current_password',
                    __('Votre mot de passe actuel ne correspond pas au mot de passe que vous avez fourni'));
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth('admin')->user();
        $user->password = Hash::make($request['password']);
        $user->update();

        $request->session()->flash('success', __('Mot de passe changé avec succès'));
        return redirect()->back();

    }
}