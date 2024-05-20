<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Payment;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\Inquiry;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        if ($user->isAdmin()) {
            $inquiries = Inquiry::all();
            $messages = Message::all();
            $students = User::where('role', 'student')->get();
            $payments = Payment::all();
            return view('admin.dashboard', compact('inquiries', 'messages', 'students', 'payments'));
        } else if($user->isStudent()) {
            $payments = auth()->user()->payments;
            return redirect()->route('student.dashboard', compact('payments'));
        }else{
            return redirect()->route('login');
        }
    }
}
