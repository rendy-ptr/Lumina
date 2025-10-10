<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Illuminate\Validation\ValidationException;

class VisitorSettingController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('visitor.setting.edit', [
            'user' => $user,
        ]);
    }

    public function index()
    {
        $user = Auth::user();
        $accountUpdatedAt = $user->updated_at->diffForHumans();
        $memberSince = $user->created_at->format('d M Y');
        $maskedPassword = str_repeat('*', 12);
        return view('visitor.setting.index', [
            'user' => $user,
            'accountUpdatedAt' => $accountUpdatedAt,
            'memberSince' => $memberSince,
            'maskedPassword' => $maskedPassword,
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();
        abort_unless($user && $user->role === 'visitor', 403);

        $intent = $request->input('intent');

        if ($intent === 'update-email') {
            $data = $request->validate([
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')->ignore($user->id),
                ],
                'email_current_password' => ['required', 'string'],
            ]);

            if (! Hash::check($data['email_current_password'], $user->password)) {
                throw ValidationException::withMessages([
                    'email_current_password' => 'The provided password does not match our records.',
                ]);
            }

            if ($data['email'] === $user->email) {
                return back()->with('status', 'Your email is already up to date.');
            }

            $user->email = $data['email'];
            $user->save();

            return back()->with('success', 'Email updated successfully.');
        }

        if ($intent === 'update-password') {
            $data = $request->validate([
                'current_password' => ['required', 'string'],
                'password' => ['required', 'string', PasswordRule::defaults(), 'confirmed'],
            ]);

            if (! Hash::check($data['current_password'], $user->password)) {
                throw ValidationException::withMessages([
                    'current_password' => 'The provided password does not match our records.',
                ]);
            }

            if (Hash::check($data['password'], $user->password)) {
                throw ValidationException::withMessages([
                    'password' => 'The new password must be different from the current password.',
                ]);
            }

            $user->password = Hash::make($data['password']);
            $user->save();

            return back()->with('success', 'Password updated successfully.');
        }

        throw ValidationException::withMessages([
            'intent' => 'Unsupported settings action.',
        ]);
    }
}
