<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function klasemen(Request $request){
        $q = $request->get('q');
        $data = DB::table('clubs')
        ->select(DB::raw('nama_tim, menang, draw, kalah, gol, kebobolan, logo, (gol - kebobolan) def_gol, SUM(menang*3+draw*1) poin'))
        ->where('nama_tim', 'LIKE', '%'.$q.'%')
        ->groupBy('id')
        ->orderBy('poin', 'desc')
        ->orderBy('def_gol', 'desc')
        ->orderBy('gol', 'desc')
        ->paginate(5);
        
        return view('klasemen', ['data'=>$data], ['q'=>$q] );
    }

    public function klasemen_v2(){
        $data = DB::table('clubs')
        ->select(DB::raw('nama_tim, menang, draw, kalah, gol, kebobolan, logo, (gol - kebobolan) def_gol,  SUM(menang*3+draw*1) poin'))
        ->groupBy('id')
        ->orderBy('poin', 'desc')
        ->orderBy('def_gol', 'desc')
        ->orderBy('gol', 'desc')
        ->get();    
        
        return view('klasemen_v2', ['data'=>$data]);
    }
}
