<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facedes\Session;
use Hash;


class LoginController extends Controller
{
    public function LoginAuth(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {

                session([
                    'data' => $user,
                    'login_status' => true,
                ]);

                return redirect('home');

            } else {
                return "login gagal";
            }
        } else {
            return "email atau password salah";
        }
    }

    public static function CheckAuth(Request $request)
    {
        $session = session()->get('data');
        return $session;
    }

    public function LogoutAuth(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
