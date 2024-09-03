<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    protected $maxAttempts = 3; // Default is 5
    protected $decayMinutes = 2; // Default is 1

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Logic login .`
     */
    public function process(Request $request)
    {

        $perMinute = 5;
        $level = 0;

        $validator = Validator::make($request->all(),
        [
            'email'     => ['required'],
            'password'  => ['required'
                , Password::defaults()
                    ->min(5)
            ]
        ],[
            'email.required' => 'Email required',
            'password.required' => 'Password required',
            'password.min' => 'Password min 8 character',
        ]);
        $params = $validator->validate();

        $creds = User::select('email', 'password')
                ->where('email', $request->email);

        $user = $creds->first();

        // check available email or username
        if ($creds->count() == 0) {
            return redirect('/auth')->with(['error' => 'Email dont exists']);
        }

        // change wrong password
        if ( !Hash::check($request->password, $user->password) ) {
            return redirect()->back()->withInput($request->only('email'))->withErrors([
                'password' => 'Password wrong',
            ]);
        }

        // session ready
        DB::beginTransaction();
        try {

            $kredensil = $request->only('email','password');
            if (Auth::attempt($kredensil)) {
                DB::commit();
                return redirect()->intended('/dashboard')->with(['success' => 'Logged successfully']);
            } else {
                $request->session()->flush();
                Auth::logout();
                DB::rollback();
                return redirect('/auth')->with(['error' => 'Something wrong']);
            }

        } catch (ValidationException $e)
        {
            DB::rollback();
            return redirect('/auth')->with(['error' => 'Required field login']);
        } catch (\Exception $e)
        {
            DB::rollback();
            return redirect('/auth')->with(['error' => 'These credentials do not match our records.']);
        }

        return redirect('/auth')
                ->withInput()
                ->with(['error' => 'These credentials do not match our records.']);
    }

    /**
     * Clear session the users.
     */
    public function logout(Request $request)
    {
        $user = Auth::user()->name;
        // log aktifitas
        $request->session()->flush();
        Auth::logout();
        return Redirect('auth');
    }

}
