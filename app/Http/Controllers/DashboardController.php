<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Laraindo\TanggalFormat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;



class DashboardController extends Controller
{
   
    public function index() 
    {


        if (!Gate::allows('menu admin') && 
            !Gate::allows('menu member') ){
            abort(403);
        }

        $mobilReady = "ass";

        return view('dashboard', compact('mobilReady'));
        
    }


}
