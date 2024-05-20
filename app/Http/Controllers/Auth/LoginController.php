<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Message;
use App\Models\User;
use App\Models\Inquiry;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        if ($user->isAdmin()) {
            $inquiries = Inquiry::all();
            $messages = Message::all();
            $students = User::where('role', 'student')->get();
            $payments = Payment::all();
            return view('admin.dashboard', compact('inquiries', 'messages', 'students', 'payments'));
        } else {
            $payments = auth()->user()->payments;
            return redirect()->route('student.dashboard', compact('payments'));
        }
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return $this->redirectAuthenticatedUser();
        } else {
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                'email' => 'These credentials do not match our records.',
            ]);
        }
    }

    protected function redirectAuthenticatedUser()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            $inquiries = Inquiry::all();
            $messages = Message::all();
            $students = User::where('role', 'student')->get();
            $payments = Payment::all();
        return view('admin.dashboard', compact('inquiries', 'messages', 'students', 'payments'));
        } else {
            $payments = auth()->user()->payments;
            return redirect()->route('student.dashboard', compact('payments'));
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
