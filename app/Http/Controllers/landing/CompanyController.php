<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterCompany;
use Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $id = null )
    {
        $id = $id ?? Auth::id();
        $data = MasterCompany::where('user_id',$id)->first();
        return view('landing.company.index', compact('data'));
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'company' => 'required',
            'description' => 'required',
            // 'contract' => 'required',
            // 'periode_start' => 'required',
            // 'periode_end' => 'required',
            // 'date' => 'required',
        ],[
            'company.required' => 'Company is required',
            'description.required' => 'Description is required',
            // 'contract.required' => 'Number PO/Contract is required',
            // 'periode_start.required' => 'Start Periode is required',
            // 'periode_end.required' => 'End Periode is required',
            // 'date.required' => 'Date is required',
            // 'status.required' => 'Status Periode is required',
        ]);

        DB::beginTransaction();

        try {
            $params = [ 
                'user_id' => @$request->user_id,
                'company' => @$request->company,
                'description' => @$request->description,
                'address' => @$request->address,
                'phone' => @$request->phone,
                'email' => @$request->email,
                'website' => @$request->website,
                'contract' => @$request->contract,
                'periode_start' => date('Y-m-d', strtotime(@$request->periode_start)),
                'periode_end' => date('Y-m-d', strtotime(@$request->periode_end)),
                'date' => date('Y-m-d', strtotime(@$request->date)),
                'status' => 0,
            ];
            // dd( @$request->id);
            $extend = MasterCompany::updateOrCreate([
                'id' => @$request->id
            ], @$params);

            DB::commit();
            return redirect()->route('company')->with(['success' => 'Data has been saved']);
        } catch (ValidationException $e)
        {
            DB::rollback();
            return redirect()->route('company')->with(['warning' => @$e->errors()]);
        } catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->route('company')->with(['danger' => @$e->getMessage()]);
        }
    }

}
