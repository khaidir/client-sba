<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Yajra\DataTables\Services\DataTable;
use Spatie\Permission\Models\Role;
use App\Models\NewWorkerPerson;
use App\Models\MasterCompany;
use Illuminate\Support\Facades\DB;

class NewWorkerController extends Controller
{

    public static function middleware(): array
    {
        return [
            // new Middleware('can:newworker-lists', only: ['index']),
            // new Middleware('can:newworker-add', only: ['add']),
            // new Middleware('can:newworker-update', only: ['update']),
            // new Middleware('can:newworker-show', only: ['show']),
            // new Middleware('can:newworker-destroy', only: ['destroy']),
        ];
    }

    public function index(){
        $company = MasterCompany::select('id', 'company')
                    ->orderBy('id', 'asc')
                    ->get();

        if(request()->ajax())
        {
            $result = NewWorkerPerson::select('*')
                    ->orderBy('id', 'asc')
                    ->get();

            return datatables()->of($result)
                ->addIndexColumn()->addColumn('aksi', function ($data) {
                    return $btn = '<a class="px-2 py-2" href="'.url('worker/edit/'.@$data->id).'"><i class="bx bxs-pencil"></i></a>
                                <a class="px-2 py-2 text-success" href="'.url('worker/send/'.@$data->id).'"><i class="bx bxs-send"></i></a>
                                <a class="px-2 py-2 delete text-danger" data-id="'.$data->id.'" href="javascript:void(0);" ><i class="bx bxs-trash"></i></a>';
                })
                ->addColumn('company',function ($data){
                    return '<a class="px-2 py-2" href="'.url('vendor/detail/'.@$data->id).'" target="_blank">'.@$data->company->company.'</a>';
                })
                ->editColumn('badge',function ($data){
                    return '<span>'.@$data->badge.'</span><br>'.@$data->name;
                })
                ->editColumn('pic',function ($data){
                    return @$data->pic;
                })
                ->editColumn('certificate_period',function ($data){
                    return date('m M Y', strtotime(@$data->certificate_period));
                })
                ->editColumn('created_at',function ($data){
                    return date('m M Y', strtotime(@$data->created_at));
                })
                ->editColumn('date_approval',function ($data){
                    return (@$data->date_approval) ? date('m M Y H:i:s', strtotime(@$data->date_approval)) : 'Not yet approved';
                })
                ->editColumn('status',function ($data){
                    $flag_badge = [
                        '1' => ['success','Approved'],
                        '0' => ['warning', 'Pending']
                    ];
                    return '<span class="badge badge-soft-'.@$flag_badge[@$data->status][0].'">'.@$flag_badge[@$data->status][1].'</span>';
                })
                ->editColumn('remarks',function ($data){
                    return (@$data->remarks) ? @$data->remarks :'-';
                })
                ->rawColumns([
                    'no',
                    'aksi',
                    'company',
                    'badge',
                    'certificate_period',
                    'pic',
                    'created_at',
                    'date_approval',
                    'status',
                    'remarks',
                ])
                ->make(true);
        }
        return view('admin.worker.index', compact('company'));
    }

    public function create() {
        $company = MasterCompany::where('status', 1)->get();
        return view('admin.worker.form', compact('company'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'badge' => 'required',
            'name' => 'required',
            'email' => 'required',
            'handphone' => 'required',
            // 'position' => 'required',
            'pic' => 'required',
            'certificate_period' => 'required',
            'insurance' => 'required',
        ],[
            'company_id.required' => 'Company is required',
            'badge.required' => 'Badge is required',
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'handphone.required' => 'Handphone is required',
            // 'position.required' => 'Position is required',
            'pic.required' => 'PIC is required',
            'certificate_period.required' => 'Certificate Periode is required',
            'insurance.required' => 'Remarks is required',
        ]);

        DB::beginTransaction();
        try {
            $params = [
                'company_id' => @$request->company_id,
                'badge' => @$request->badge,
                'name' => @$request->name,
                'email' => @$request->email,
                'handphone' => @$request->handphone,
                // 'position' => @$request->position,
                'pic' => @$request->pic,
                'certificate_period' => date('Y-m-d', strtotime(@$request->certificate_period)),
                'insurance' => @$request->insurance,
                'status' => (@$request->status == true) ? 1:0,
                'remarks' => @$request->remarks,
            ];

            if ( @$request->status == true ) {
                $params['date_approval'] = date('Y-m-d H:i:s');
            }

            $worker = NewWorkerPerson::updateOrCreate([
                'id' => $request->id
            ], @$params);

            DB::commit();
            return redirect()->route('worker.index')->with(['success' => 'Data has been saved']);
        } catch (ValidationException $e)
        {
            DB::rollback();
            return redirect()->route('worker.index')->with(['warning' => @$e->errors()]);
        } catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->route('worker.index')->with(['danger' => @$e->getMessage()]);
        }
    }

    public function edit( int $id = null ) {
        $company = MasterCompany::where('status', 1)->get();
        $data = NewWorkerPerson::find($id);
        return view('admin.worker.form', compact('data', 'company'));
    }

    public function send( int $id = null )
    {
        $data = NewWorkerPerson::select('token', 'token_at', 'handphone', 'email')
                ->where('id', $id)
                ->first($id);

        if (!$data->handphone or !$data->email) {
            return redirect()->route('worker.index')->with(['error' => 'Cannot send message, please check Email/Phone Number']);
        }

        DB::beginTransaction();
        try {
            $params = [
                'token_at' => date('Y-m-d H:i:s'),
            ];

            $worker = NewWorkerPerson::updateOrCreate([
                'id' => $request->id
            ], @$params);

            DB::commit();
            return redirect()->route('worker.index')->with(['success' => 'Message sended']);
        } catch (ValidationException $e)
        {
            DB::rollback();
            return redirect()->route('worker.index')->with(['warning' => @$e->errors()]);
        } catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->route('worker.index')->with(['error' => @$e->getMessage()]);
        }

    }

    public function destroy( int $id = null )
    {
        $worker = NewWorker::findOrFail($id);
        $worker->delete();
        return redirect()->route('worker.index')->with(['success' => 'Data has been deleted']);
    }

}
