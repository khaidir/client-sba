<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Yajra\DataTables\Services\DataTable;
use Spatie\Permission\Models\Role;
use App\Models\MasterCompany;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{

    public static function middleware(): array
    {
        return [
            // new Middleware('can:company-lists', only: ['index']),
            // new Middleware('can:company-add', only: ['add']),
            // new Middleware('can:company-update', only: ['update']),
            // new Middleware('can:company-show', only: ['show']),
            // new Middleware('can:company-destroy', only: ['destroy']),
        ];
    }

    public function index()
    {
        if(request()->ajax())
        {
            $result = MasterCompany::select('*')
                    ->orderBy('id', 'asc')
                    ->get();

            return datatables()->of($result)
                ->addIndexColumn()->addColumn('aksi', function ($data) {
                    return $btn = '<a class="px-2 py-2" href="'.url('vendor/edit/'.@$data->id).'"><i class="bx bxs-pencil"></i></a>
                                <a class="px-2 py-2" href="'.url('vendor/contract/'.@$data->id).'"><i class="bx bx-list-ol"></i></a>
                                <a class="px-2 py-2 delete text-danger" data-id="'.$data->id.'" href="javascript:void(0);" ><i class="bx bxs-trash"></i></a>';
                })
                ->editColumn('contract',function ($data){
                    return @$data->contract;
                })
                ->addColumn('company',function ($data){
                    return @$data->company;
                })
                ->editColumn('description',function ($data){
                    return @$data->description;
                })
                ->editColumn('periode_start',function ($data){
                    return date('m M Y', strtotime(@$data->periode_start));
                })
                ->editColumn('periode_end',function ($data){
                    return date('m M Y', strtotime(@$data->periode_end));
                })
                ->editColumn('date',function ($data){
                    return date('m M Y H:i', strtotime(@$data->date_request));
                })
                ->editColumn('status',function ($data){
                    $flag_badge = [
                        '1' => ['success','Approved'],
                        '0' => ['warning', 'Pending']
                    ];
                    return '<span class="badge badge-soft-'.@$flag_badge[@$data->status][0].'">'.@$flag_badge[@$data->status][1].'</span>';
                })
                ->rawColumns([
                    'no',
                    'aksi',
                    'contract',
                    'company',
                    'description',
                    'periode_start',
                    'periode_end',
                    'date',
                    'status',
                ])
                ->make(true);
        }
        return view('admin.vendor.index');
    }

    public function create() {
        $company = MasterCompany::where('status', 1)->get();
        return view('admin.vendor.form', compact('company'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'description' => 'required',
            'contract' => 'required',
            'periode_start' => 'required',
            'periode_end' => 'required',
            'date' => 'required',
        ],[
            'company.required' => 'Company is required',
            'description.required' => 'Description is required',
            'contract.required' => 'Number PO/Contract is required',
            'periode_start.required' => 'Start Periode is required',
            'periode_end.required' => 'End Periode is required',
            'date.required' => 'Date is required',
            'status.required' => 'Status Periode is required',
        ]);

        DB::beginTransaction();
        try {
            $params = [
                'company' => @$request->company,
                'description' => @$request->description,
                'contract' => @$request->contract,
                'periode_start' => date('Y-m-d', strtotime(@$request->periode_start)),
                'periode_end' => date('Y-m-d', strtotime(@$request->periode_end)),
                'date' => date('Y-m-d', strtotime(@$request->date)),
                'status' => (@$request->status == true) ? 1:0,
            ];

            $extend = MasterCompany::updateOrCreate([
                'id' => $request->id
            ], @$params);

            DB::commit();
            return redirect()->route('company.index')->with(['success' => 'Data has been saved']);
        } catch (ValidationException $e)
        {
            DB::rollback();
            return redirect()->route('company.index')->with(['warning' => @$e->errors()]);
        } catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->route('company.index')->with(['danger' => @$e->getMessage()]);
        }
    }

    public function edit( int $id = null )
    {
        $data = MasterCompany::find($id);
        return view('admin.vendor.form', compact('data'));
    }

    public function destroy( int $id = null )
    {
        $worker = MasterCompany::findOrFail($id);
        $worker->delete();
        return redirect()->route('company.index')->with(['success' => 'Data has been deleted']);
    }

}
