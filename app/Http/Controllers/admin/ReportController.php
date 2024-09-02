<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Auth;

class ReportController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(request()->ajax())
        {
            $condition = [];
            $mulai = '';
            $berakhir = '';
            if(@$request->mulai)
            {
                $mulai = $request->mulai ? date('Y-m-d', strtotime(@$request->mulai)) : '1970-01-01';
            }
            if(@$request->berakhir)
            {
                $berakhir = $request->berakhir ? date('Y-m-d', strtotime(@$request->berakhir)) : now();
            }
            if(@$request->status)
            {
                $condition['status'] = @$request->status;
            }

            // if(@$request->mulai != '' or $request->berakhir != '') {
            //     $mulai = $request->mulai ? date('Y-m-d', strtotime(@$request->mulai)) : '1970-01-01';
            //     $berakhir = $request->berakhir ? date('Y-m-d', strtotime(@$request->berakhir)) : now();

            //     $result = Perkara::select('*')
            //             ->where($condition)
            //             ->whereBetween('tgl_perkara', [$mulai, $berakhir])
            //             ->orderBy('created_at', 'desc')
            //             ->get();
            // } else {
            //     $result = Perkara::select('*')
            //             ->where($condition)
            //             ->orderBy('created_at', 'desc')
            //             ->get();
            // }

            return datatables()->of($result)
                ->addIndexColumn()
                // ->addColumn('number',function ($data){
                //     return '<a href="'.url('perkara/dokumen/'.@$data->id).'">'.@$data->number.'</a>';
                // })
                // ->editColumn('perkara',function ($data){
                //     return @$data->perkara;
                // })
                // ->editColumn('alamat',function ($data){
                //     return @$data->alamat;
                // })
                // ->editColumn('tanggal',function ($data){
                //     return date('d M Y', strtotime(@$data->tgl_perkara));
                // })
                // ->editColumn('status',function ($data){
                //     $flag_badge = [
                //         '0' => ['danger', 'Dibatalkan'],
                //         '1' => ['success','Telah Selesai'],
                //         '2' => ['warning', 'Dalam Proses']
                //     ];
                //     return '<span class="badge badge-soft-'.@$flag_badge[@$data->status][0].'">'.@$flag_badge[@$data->status][1].'</span>';
                // })
                ->rawColumns([
                    'no',
                    'number'
                ])
                ->make(true);
        }
        return view('admin.report.index');
    }

}
