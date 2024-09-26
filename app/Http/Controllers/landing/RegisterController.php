<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('auth.registerUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function process(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:7|confirmed',
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['status'] = 0;

        try {

            if (User::where('email', $data['email'])->exists()) {
                return back()->with('error', 'Email sudah terdaftar');
            }

            DB::beginTransaction();
            $user = User::create($data);
            // auto verified email
            $user->markEmailAsVerified();
            $user->assignRole('user');
           
            DB::commit();

            return redirect()->route('/')->with('success', 'Berhasil mendaftar');
            
        } catch (\Throwable $th) {

            DB::rollBack();
            return back()->with('error', $th->getMessage());

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
