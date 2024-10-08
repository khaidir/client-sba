<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Biodata;


class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('landing.biodata.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'user_id' => 'required',
            'nik' => 'required',
            // 'phone' => 'required',
            // 'alamat' => 'required',
            // 'tmpt_lahir' => 'required',
            // 'tgl_lahir' => 'required',
            // 'jabatan' => 'required',
        ],[
            'user_id.required' => 'Nama is required',
            'nik.required' => 'NIK is required',
            // 'phone.required' => 'No.HP is required',
            // 'alamat.required' => 'Alamat  is required',
            // 'tmpt_lahir.required' => 'Tempat Lahir  is required',
            // 'tgl_lahir.required' => 'Tanggal Lahir is required',
            // 'jabatan.required' => 'Jabatan Periode is required',
        ]);

        DB::beginTransaction();
        try {
            $paramsUser = [ 
                'name' => @$request->name_user,
                'status' => 1,
            ];
            $params = [ 
                'user_id' => @$request->user_id,
                'nik' => @$request->nik,
                'phone' => @$request->phone,
                'alamat' => @$request->alamat,
                'tmpt_lahir' => @$request->tmpt_lahir,
                'tgl_lahir' => @$request->tgl_lahir,
                'jabatan' => @$request->jabatan,
                'status' => 0,
            ];

            // dd($params);
            $extend = User::updateOrCreate([
                'id' => Auth()->user()->id,
            ], @$paramsUser);

            $extend = Biodata::create(@$params);

            DB::commit();
            return redirect()->route('company')->with(['success' => 'Data has been saved']);
        } catch (ValidationException $e)
        {
            DB::rollback();
            return redirect()->route('biodata')->with(['warning' => @$e->errors()]);
        } catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->route('biodata')->with(['danger' => @$e->getMessage()]);
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
