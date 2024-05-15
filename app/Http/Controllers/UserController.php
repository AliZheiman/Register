<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Events\RegisterEvent;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CodeVerify;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function signupShow(){
        return view("SignUp");
    }

    public function loginShow(){
        return view("LogIn");
    }

    public function SignUp(Request $request){
        $request->validate([
            "name"              =>    "required|string",
            "email"             =>    "required|email",
            "password"          =>    "required|confirmed",
            "phone"             =>    "required|numeric",
            "certificate"       =>    "required|mimes:pdf"
        ]);

        Storage::putFile('certificates', $request->file('certificate'));

        $user = User::create([
            "name"              =>    $request->name,
            "email"             =>    $request->email,
            "password"          =>    $request->password,
            "phone"             =>    $request->phone,
            "certificate"       =>    $request->certificate,
        ]);


        RegisterEvent::dispatch($user);

        return view("CodeVerify");
    }

    public function LogIn(Request $request){
        $request->validate([
            'email'             => 'required|email',
            'phone'             => 'required|numeric',
            'password'          => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($request->email)->plainTextToken;
    }

    public function showCode(){
        return view('CodeVerify');
    }
    public function codeVerify(Request $request){
        $request->validate([
            'email'         =>          'required|email',
            'code'          =>          'required|string'
        ]);
        $verify = CodeVerify::where("email", "=", $request->email)->where("code", "=", $request->code)->first();
        if ($verify) {
            $date = Carbon::parse($verify->updated_at);
            if ($date->isFuture()) {
                return "You are logged in";
            }
            else{
                return "Your code is expired";
            }
        }
        else{
            return "Email or code invalid";
        }
    }
}
