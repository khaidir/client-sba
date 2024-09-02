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
use App\Models\AccessRequest;
use App\Models\AccessVisitor;
use DB;

class AccessVisitorController extends Controller
{

    // public static function middleware(): array
    // {
    //     return [
    //         // new Middleware('can:visitor-lists', only: ['index']),
    //         // new Middleware('can:visitor-add', only: ['add']),
    //         // new Middleware('can:visitor-update', only: ['update']),
    //         // new Middleware('can:visitor-show', only: ['show']),
    //         // new Middleware('can:visitor-destroy', only: ['destroy']),
    //     ];
    // }

    public function index($id = null){
        $request = AccessRequest::find($id);
        if(request()->ajax())
        {
            $result = AccessVisitor::select('*')
                    ->where('request_id', @$id)
                    ->orderBy('id', 'asc')
                    ->get();

            return datatables()->of($result)
                ->addIndexColumn()->addColumn('aksi', function ($data) {
                    return $btn = '<a class="px-2 py-2" href="'.url('access/visitor/edit/'.@$data->id).'"><i class="bx bxs-pencil"></i></a>
                                <a class="px-2 py-2 delete text-danger" data-id="'.$data->id.'" href="javascript:void(0);" ><i class="bx bxs-trash"></i></a>';
                })
                ->editColumn('fullname',function ($data){
                    return '<strong>'.@$data->fullname.'</strong><br>'.$data->email;
                })
                ->editColumn('country',function ($data){
                    return @$data->country;
                })
                ->editColumn('type',function ($data){
                    $flag_badge = [
                        '1' => ['primary','KTP'],
                        '2' => ['secondary', 'Passport'],
                        '3' => ['warning', 'Visa']
                    ];
                    return '<span class="badge badge-soft-'.@$flag_badge[@$data->type][0].'">'.@$flag_badge[@$data->type][1].'</span>';
                })
                ->editColumn('docs_path',function ($data){
                    $file = (@$data->docs_path) ? '<a href="'.@$data->docs_path.'" class="btn btn-sm btn-primary">View Document</a>':'<span class="badge badge-soft-warning">No Document</span>';
                    return $file;
                })
                ->editColumn('status',function ($data){
                    $flag_badge = [
                        '1' => ['success','Uploaded'],
                        '0' => ['warning', 'No Document']
                    ];
                    return '<span class="badge badge-soft-'.@$flag_badge[@$data->status][0].'">'.@$flag_badge[@$data->status][1].'</span>';
                })
                ->editColumn('tanggal',function ($data){
                    return date('m M Y', strtotime(@$data->tanggal));
                })
                ->rawColumns([
                    'no',
                    'aksi',
                    'fullname',
                    'country',
                    'type',
                    'docs_path',
                    'status',
                    'tanggal',
                ])
                ->make(true);
        }
        return view('admin.visitor.index', compact('request'));
    }

    public function create( $id = null  ) {
        $request = AccessRequest::find($id);
        return view('admin.visitor.form', compact('request'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'country' => 'required',
            'type' => 'required',
        ],[
            'fullname.required' => 'Fullname is required',
            'email.required' => 'Tanggal is required',
            'country.required' => 'Country is required',
            'Type.required' => 'Type is required',
          ]);

        DB::beginTransaction();
        try {
            $params = [
                'request_id' => @$request->request_id,
                'fullname' => @$request->fullname,
                'email' => @$request->email,
                'country' => @$request->country,
                'type' => @$request->type,
            ];

            if($request->file('docs_path')){
                $path = $request->file('docs_path')->store('uploads', 'public');
                $params['docs_path'] = $path;
                $params['status'] = 1;
            }

            $visitor = AccessVisitor::updateOrCreate([
                'id' => $request->id
            ], @$params);

            DB::commit();
            return redirect()->route('visitor.index', @$request->request_id)->with(['success' => 'Data has been saved']);
        } catch (ValidationException $e)
        {
            DB::rollback();
            return redirect()->route('visitor.index', @$request->request_id)->with(['warning' => @$e->errors()]);
        } catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->route('visitor.index', @$request->request_id)->with(['danger' => @$e->getMessage()]);
        }
    }

    public function edit( int $id = null )
    {
        $request = AccessRequest::find($id);
        $data = AccessVisitor::where('id', $id)->first();
        return view('admin.visitor.form', compact('request', 'data'));
    }

    public function delete( int $id = null )
    {
        $request = AccessRequest::findOrFail($id);
        $request->delete();
        return redirect()->route('visitor.index')->with(['success' => 'Data has been deleted']);
    }

}
