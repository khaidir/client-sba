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
// use App\Models\Penyidik;
use Spatie\Permission\Models\Role;
// use Auth;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax())
        {
            $result = User::select('roles.name as rules', 'users.name', 'email', 'users.id', 'users.status', 'handphone')
                    ->leftJoin('model_has_roles', 'model_has_roles.model_id', 'users.id')
                    ->leftJoin('roles', 'roles.id', 'model_has_roles.role_id')
                    ->orderBy('id', 'asc')
                    ->get();

            return datatables()->of($result)
                ->addIndexColumn()->addColumn('aksi', function ($data) {
                    return $btn = '<a class="px-2 py-2" href="'.url('users/edit/'.@$data->id).'"><i class="bx bxs-pencil"></i></a>
                                <a class="px-2 py-2 delete text-danger" data-id="'.$data->id.'" href="javascript:void(0);" ><i class="bx bxs-trash"></i></a>';
                })
                ->addColumn('name',function ($data){
                    return '<span>'. @$data->name. '</span>';
                })
                ->editColumn('email',function ($data){
                    return @$data->email;
                })
                ->editColumn('rules',function ($data){
                    if(!empty($data->getRoleNames())) {
                        foreach($data->getRoleNames() as $v) {
                            return '<label class="badge bg-success">'. $v .'</label>';
                        }
                    }
                })
                ->editColumn('handphone',function ($data){
                    return @$data->handphone;
                })
                ->editColumn('status',function ($data){
                    $flag_badge = [
                        '1' => ['success','Aktif'],
                        '2' => ['warning', 'Tidak Aktif']
                    ];
                    return '<span class="badge badge-soft-'.@$flag_badge[@$data->status][0].'">'.@$flag_badge[@$data->status][1].'</span>';
                })
                ->rawColumns([
                    'no',
                    'aksi',
                    'name',
                    'email',
                    'rules',
                    'status',
                ])
                ->make(true);
        }
        return view('admin.pengguna.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.pengguna.form', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
                'id' => $request->id
            ], @$data);

            $user->assignRole(@$request->input('roles'));

            DB::commit();
            return redirect('/users')->with(['success' => 'Profil saved']);
        } catch (ValidationException $e)
        {
            DB::rollback();
            return redirect('/users')->with(['error' => 'Required field +']);
        } catch (\Exception $e)
        {
            DB::rollback();
            return redirect('/users')->with(['error' => 'Sorry, internal error']);
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

        return view('admin.pengguna.form', compact('data', 'roles', 'user_role'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id = null)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with(['success' => 'User has been deleted!']);
    }
}
