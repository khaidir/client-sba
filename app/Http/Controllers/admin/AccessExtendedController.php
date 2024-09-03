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
use App\Models\AccessExtended;
use App\Models\MasterCompany;
use Illuminate\Support\Facades\DB;

class AccessExtendedController extends Controller
{

    public static function middleware(): array
    {
        return [
            // new Middleware('can:extended-lists', only: ['index']),
            // new Middleware('can:extended-add', only: ['add']),
            // new Middleware('can:extended-update', only: ['update']),
            // new Middleware('can:extended-show', only: ['show']),
            // new Middleware('can:extended-destroy', only: ['destroy']),
        ];
    }

    public function index()
    {
        $company = MasterCompany::select('id', 'company')
                    ->orderBy('id', 'asc')
                    ->get();

        if(request()->ajax())
        {
            $result = AccessExtended::select('*')
                    ->orderBy('id', 'asc')
                    ->get();

            return datatables()->of($result)
                ->addIndexColumn()->addColumn('aksi', function ($data) {
                    return $btn = '<a class="px-2 py-2" href="'.url('extend/edit/'.@$data->id).'"><i class="bx bxs-pencil"></i></a>
                                <a class="px-2 py-2 delete text-danger" data-id="'.$data->id.'" href="javascript:void(0);" ><i class="bx bxs-trash"></i></a>';
                })
                ->addColumn('company',function ($data){
                    return '<a class="px-2 py-2" href="'.url('vendor/detail/'.@$data->id).'" target="_blank">'.@$data->company->company.'</a>';
                })
                ->editColumn('number_contract',function ($data){
                    return @$data->number_contract;
                })
                ->editColumn('work_detail',function ($data){
                    return @$data->work_detail;
                })
                ->editColumn('type_contract',function ($data){
                    return @$data->type_contract;
                })
                ->editColumn('periode',function ($data){
                    return date('m M Y', strtotime(@$data->periode));
                })
                ->editColumn('date_request',function ($data){
                    return (@$data->date_request) ? date('m M Y H:i', strtotime(@$data->date_request)) : 'Not yet approved';
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
                    'company',
                    'number_contract',
                    'work_detail',
                    'type_contract',
                    'periode',
                    'date_request',
                    'status',
                ])
                ->make(true);
        }
        return view('admin.extended.index', compact('company'));
    }

    public function create() {
        $company = MasterCompany::where('status', 1)->get();
        return view('admin.extended.form', compact('company'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'work_detail' => 'required',
            'number_contract' => 'required',
            'type_contract' => 'required',
            'periode' => 'required',
            'date_request' => 'required',
        ],[
            'company_id.required' => 'Company is required',
            'work_detail.required' => 'Work Detail is required',
            'number_contract.required' => 'Number PO/Contract is required',
            'type_contract.required' => 'Type Periode is required',
            'periode.required' => 'Periode is required',
            'date_request.required' => 'Date Request is required',
            'status.required' => 'Status Periode is required',
        ]);

        DB::beginTransaction();
        try {
            $params = [
                'company_id' => @$request->company_id,
                'work_detail' => @$request->work_detail,
                'number_contract' => @$request->number_contract,
                'type_contract' => @$request->type_contract,
                'periode' => date('Y-m-d', strtotime(@$request->periode)),
                'date_request' => date('Y-m-d', strtotime(@$request->date_request)),
                'status' => (@$request->status == true) ? 1:0,
            ];

            $extend = AccessExtended::updateOrCreate([
                'id' => $request->id
            ], @$params);

            DB::commit();
            return redirect()->route('extend.index')->with(['success' => 'Data has been saved']);
        } catch (ValidationException $e)
        {
            DB::rollback();
            return redirect()->route('extend.index')->with(['warning' => @$e->errors()]);
        } catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->route('extend.index')->with(['danger' => @$e->getMessage()]);
        }
    }

    public function edit( int $id = null )
    {
        $company = MasterCompany::where('status', 1)->get();
        $data = AccessExtended::find($id);
        return view('admin.extended.form', compact('data', 'company'));
    }

    public function destroy( int $id = null )
    {
        $worker = AccessExtended::findOrFail($id);
        $worker->delete();
        return redirect()->route('extend.index')->with(['success' => 'Data has been deleted']);
    }

}
