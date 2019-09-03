<?php

namespace App\Http\Controllers;
use App\Vast;
use App\Media;  
use Illuminate\Http\Request;

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
        $vasts = Vast::where('status',1)->get();
        $medias = new Media();
        return view('home',['direct'=>$medias->where('name','DIRECT')->get()->count(),'drive'=>$medias->where('name','DRIVE')->get()->count(),'vasts' => $vasts]);
    }
}
