<?php

namespace App\Http\Controllers;

use App\Helper\CustomHelper;
use App\Helper\RedirectHelper;
use App\Models\Animal;
use App\Models\Categories;
use App\Models\LoginSlider;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request) {
        
        if ($request->isMethod('POST')) {
            // return $request;
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:' . User::$minimumPasswordLength
            ]);

            $credential = $request->only('email', 'password');

            if (Auth::attempt($credential)) {
                if (\auth()->user()->status !== User::$statusArrays[1]) {
                    Auth::logout();
                    \Illuminate\Support\Facades\Session::flush();
                    return RedirectHelper::backWithInput('<strong>Sorry!!!</strong> Your not a active user.');
                }
                return to_route('dashboard');
            }
            return RedirectHelper::backWithInput('<strong>Sorry!!!</strong> Your email or password is wrong.');
        }
   $data['images'] = LoginSlider::where('status',LoginSlider::$statusArray[0])->get();
   $data['animal'] = Animal::where('status', '=', Animal::$statusArrays[0])->get();
            $data['category'] = Categories::where('status', '=', Categories::$statusArrays[0])->get();
            $data['subcategory'] = SubCategory::where('status', '=', SubCategory::$statusArrays[0])->get();
            $data['cartItems'] = \Cart::content();
        // return $data;
        return view('admin.auth.login', $data);
    }

    public function register(Request $request) {
        if ($request->isMethod('POST')) {
            $message = '<strong>Congratulations!!!</strong> Successfully ';
            $rules = [
                'username' => 'required|string|unique:' . with(new User)->getTable() . ',username,',
                'full_name' => 'required|string|unique:' . with(new User)->getTable() . ',username,',
                'email' => 'required|email|unique:' . with(new User)->getTable() . ',email,',
                'password' => 'required|string|min:6|confirmed',
                'phone' => 'required|regex:' . CustomHelper::PhoneNoRegex,
            ];
            $message = $message . ' Register';
            $request->validate($rules);
            $user = new User();
            try {
                $user->username = $request->username;
                $user->full_name = $request->full_name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->phone = $request->phone;
                $user->status = User::$statusArrays[1];
                if ($user->save()) {
                    $user->assignRole('Customer');
//        return RedirectHelper::routeSuccess('register.step2', $message);
                    return RedirectHelper::routeSuccess('login', $message);
                }
                return RedirectHelper::backWithInput();
            } catch (QueryException $e) {
//                return $e;
                return RedirectHelper::backWithInputFromException();
            }
        }
        return view('site.registration.register');
    }




    public function resetPassword(Request $request,$token)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where('email', $request->email)
            ->first();
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        User::where('email', $updatePassword->email)
            ->update(['password' => bcrypt($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return RedirectHelper::routeSuccess('login','<strong>Congratulations!!!</strong> Password updated.');
    }
}
