<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LandingController extends Controller
{
    //
    public function index()
    {
        $status = Auth()->user()->status;
        
        if($status == 0) {
            return redirect()->route('biodata.index');
        } else {
            return view('landing.dashboard.home');
        }
    }

    public function about()
    {
        return view('landing.about.index');
    }

    public function contact()
    {
        return view('landing.contact.index');
    }

    public function faq()
    {
        return view('landing.faq.index');
    }
}
