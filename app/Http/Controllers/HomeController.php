<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;
use App\Models\ReportFilter;
use Auth;

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
        $route_name = Route::currentRouteName();
        $filters = ReportFilter::where('report_name',$route_name)->where('user_id',Auth::id())->get();
        return view('home',compact('filters','route_name'));
    }
}
