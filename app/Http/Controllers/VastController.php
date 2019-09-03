<?php

namespace App\Http\Controllers;

use App\Vast;
use App\Media;
use Auth;
use DB;
use Session;
use Illuminate\Http\Request;

class VastController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vasts = Vast::where('status',1)->get();
        $medias = Media::where('status',1)->get();

        return view('vast',['medias'=>$medias,'vasts' => $vasts]);
    }

    public function test()
    {
        return view('test');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $data = [];
        $this->validate($req, array(
                'duration'  => 'required',
                'type'  => 'required',
                'listmedia'  => 'required',
                'urltarget'  => 'required',
                'title'  => 'required',
            ));
        if($req->formedi == '0'){
        $vast = new Vast;
        $vast->name = substr(md5(time()), 6);
        $vast->user_id = Auth::user()->id;
        $vast->title = $req->title;
        $vast->url = $req->urltarget;
        $vast->duration = $req->duration;
        $vast->status = 1;
        $vast->type = $req->type;
        $vast->counter = 0;
        $vast->media_data = $req->listmedia;
        $vast->save();
        Session::flash('success', 'The VAST was successfully created!');
        }else{
        $vast = Vast::where('id',$req->formedi)->first();
        if($vast){
            $arr = ['title'=>$req->title,'url'=>$req->urltarget,'duration'=>$req->duration];
            $vasts = Vast::where('id',$req->formedi)->update($arr);
            if($vasts){
            Session::flash('success', 'Success Updating VAST : '.$req->formedi);
            }else{
        Session::flash('error', 'Failed to Update VAST!');
            }
        }else{
        Session::flash('error', 'Invalid VAST ID!');
        }
        }
        return redirect()->route('xml');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vast  $vast
     * @return \Illuminate\Http\Response
     */
    public function show(Vast $vast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vast  $vast
     * @return \Illuminate\Http\Response
     */
    public function edit(Vast $vast)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vast  $vast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vast $vast)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vast  $vast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vast $vast)
    {
        //
    }
}
