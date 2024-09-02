<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Yajra\DataTables\Services\DataTable;
use App\Models\User;
use App\Models\Penyidik;
use Spatie\Permission\Models\Role;
use Auth;

class ProfilController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        $data = User::findOrFail(auth::user()->id);
        return view('admin.profil.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'id'            => [],
            'name'          => ['required','min:3','max:60'],
            'email'         => ['required'],
            'handphone'     => ['required'],
            'alamat'        => ['nullable'],
            'roles'         => ['required']
        ],[
            'name.required'         => 'Nama Lengkap wajib diisi',
            'handphone.required'  => 'No. Handphone wajib diisi',
            'alamat.required'       => 'Alamat tidak boleh kosong',
        ]);
        $params = $validator->validate();

        DB::beginTransaction();
        try {

            $data = [
                'name'          => $request->name,
                'email'         => $request->email,
                'handphone'     => $request->handphone,
                'instansi_id'   => $request->instansi_id,
                'alamat'        => $request->alamat,
                'status'        => $request->status,
            ];

            if ($request->hasFile('photos')) {
                $filePath = Storage::disk('public')->put('images', request()->file('photos'));
                $data['photos'] = $filePath;
            }

            if ($request->password != NULL && $request->cpassword != NULL) {
                $request->validate([
                    'password'      => ['required'],
                    'cpassword'     => ['same:password'],
                ]);
                $data['password'] = Hash::make($request->password);
            }

            $user = User::updateOrCreate([
                'id' => auth()::user()->id
            ], @$data);

            DB::commit();
            return redirect('/profil')->with(['success' => 'Profil berhasil diperbaharui']);
        } catch (ValidationException $e)
        {
            DB::rollback();
            return redirect('/profil')->with(['error' => 'Lengkapi Formulir +']);
        } catch (\Exception $e)
        {
            DB::rollback();
            return redirect('/profil')->with(['error' => 'Maaf, internal error']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id = null)
    {
        $data = User::findOrFail($id);
        $roles = Role::pluck('name','name')->all();
        $user_role = @$data->roles->pluck('name','name')->all();

        // $instansi = Instansi::all();

        // dd($roles);

        return view('admin.pengguna.form', compact('data', 'roles', 'user_role'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id = null)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('pengguna.index')->with(['success' => 'Pengguna berhasil dihapus!']);
    }
}
