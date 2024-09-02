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
use App\Models\AccessRequest;
use App\Models\AccessVisitor;
use DB;

class AccessRequestController extends Controller
{

    public static function middleware(): array
    {
        return [
            // new Middleware('can:accessrequest-lists', only: ['index']),
            // new Middleware('can:accessrequest-add', only: ['add']),
            // new Middleware('can:accessrequest-update', only: ['update']),
            // new Middleware('can:accessrequest-show', only: ['show']),
            // new Middleware('can:accessrequest-destroy', only: ['destroy']),
        ];
    }

    public function index(){
        if(request()->ajax())
        {
            $result = AccessRequest::select('*')
                    ->orderBy('id', 'asc')
                    ->get();

            return datatables()->of($result)
                ->addIndexColumn()->addColumn('aksi', function ($data) {
                    return $btn = '<a class="px-2 py-2" href="'.url('access/edit/'.@$data->id).'"><i class="bx bxs-pencil"></i></a>
                                <a class="px-2 py-2 delete text-danger" data-id="'.$data->id.'" href="javascript:void(0);" ><i class="bx bxs-trash"></i></a>';
                })
                ->addColumn('visitor',function ($data){
                    $count = AccessVisitor::where('request_id', $data->id)->count();
                    return '<a class="px-2 py-2" href="'.url('access/visitor/'.@$data->id).'"><i class="bx bxs-user"></i> '.@$count.' Person</a>';
                })
                ->editColumn('destination',function ($data){
                    return @$data->destination;
                })
                ->editColumn('duration',function ($data){
                    return @$data->duration;
                })
                ->editColumn('pic',function ($data){
                    return @$data->pic;
                })
                ->editColumn('status',function ($data){
                    $flag_badge = [
                        '1' => ['success','Aktif'],
                        '0' => ['warning', 'Tidak Aktif']
                    ];
                    return '<span class="badge badge-soft-'.@$flag_badge[@$data->status][0].'">'.@$flag_badge[@$data->status][1].'</span>';
                })
                ->editColumn('tanggal',function ($data){
                    return date('m M Y', strtotime(@$data->tanggal));
                })
                ->rawColumns([
                    'no',
                    'aksi',
                    'visitor',
                    'destination',
                    'duration',
                    'pic',
                    'status',
                    'tanggal',
                ])
                ->make(true);
        }
        return view('admin.request.index');
    }

    public function create() {
        return view('admin.request.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'destination' => 'required',
            'duration' => 'required',
            'pic' => 'required',
            'remarks' => 'required',
        ],[
            'destination.required' => 'Destination is required',
            'duration.required' => 'duration is required',
            'pic.required' => 'PIC is required',
            'remarks.required' => 'Remarks is required',
        ]);

        DB::beginTransaction();
        try {
            $params = [
                'destination' => @$request->destination,
                'duration' => @$request->duration,
                'pic' => @$request->pic,
                'remarks' => @$request->remarks,
                'status' => (@$request->status == true) ? 1:0,
            ];

            if($request->id == '') {
                $params['tanggal'] = date('Y-m-d');
            }

            if($request->file('docs_path')){
                $path = $request->file('docs_path')->store('uploads', 'public');
                $params['docs_path'] = $path;
            }

            $dokumen = AccessRequest::updateOrCreate([
                'id' => $request->id
            ], @$params);

            DB::commit();
            return redirect()->route('access.index', $request->request_id)->with(['success' => 'Data has been saved']);
        } catch (ValidationException $e)
        {
            DB::rollback();
            return redirect()->route('access.index', $request->request_id)->with(['warning' => @$e->errors()]);
        } catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->route('access.index', $request->request_id)->with(['danger' => @$e->getMessage()]);
        }
    }

    public function edit( int $id = null ) {
        $data = AccessRequest::find($id);
        return view('admin.request.form', compact('data'));
    }

    public function destroy( int $id = null )
    {
        $request = AccessRequest::findOrFail($id);
        $request->delete();
        return redirect()->route('access.index')->with(['success' => 'Data has been deleted']);
    }

}
