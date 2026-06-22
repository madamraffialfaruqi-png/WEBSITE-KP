<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.index');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.index'));
        }

        return back()->withErrors([
            'username' => 'ID Admin atau password salah.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function generateCaptcha()
    {
        $code = '';
        $characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        for ($i = 0; $i < 5; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        
        session(['captcha_code' => strtolower($code)]);

        $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="120" height="45" viewBox="0 0 120 45">';
        $svg .= '<rect width="100%" height="100%" fill="#1e293b"/>';
        
        for ($i = 0; $i < 6; $i++) {
            $svg .= '<line x1="'.rand(0, 120).'" y1="'.rand(0, 45).'" x2="'.rand(0, 120).'" y2="'.rand(0, 45).'" stroke="#475569" stroke-width="1.5"/>';
        }
        
        for ($i = 0; $i < 5; $i++) {
            $char = $code[$i];
            $x = 12 + ($i * 20) + rand(-2, 2);
            $y = 30 + rand(-4, 4);
            $rotate = rand(-15, 15);
            $svg .= '<text x="'.$x.'" y="'.$y.'" fill="#d97706" font-family="monospace" font-weight="bold" font-size="24" transform="rotate('.$rotate.' '.$x.' '.$y.')">'.$char.'</text>';
        }
        
        $svg .= '</svg>';
        
        return response($svg, 200)->header('Content-Type', 'image/svg+xml');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'secret_code' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'captcha' => 'required|string',
        ]);

        if ($request->secret_code !== '@_Nimda*Admin._') {
            return back()->withErrors([
                'secret_code' => 'Kode Rahasia yang dimasukkan salah.',
            ])->withInput($request->except(['password', 'password_confirmation', 'captcha', 'secret_code']));
        }

        if (strtolower($request->captcha) !== session('captcha_code')) {
            return back()->withErrors([
                'captcha' => 'Kode captcha tidak cocok.',
            ])->withInput($request->except(['password', 'password_confirmation', 'captcha']));
        }

        $user = \App\Models\User::where('username', $request->username)
                                ->first();

        if (!$user) {
            return back()->withErrors([
                'username' => 'Username tidak cocok dengan data admin.',
            ])->withInput($request->except(['password', 'password_confirmation', 'captcha']));
        }

        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('admin.login')->with('success', 'Password berhasil diubah. Silakan login dengan password baru.');
    }
}
