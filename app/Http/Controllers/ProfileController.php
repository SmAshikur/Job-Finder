<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::get();
        //dd($profile);
        return view('profile.index',compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

//ajax action

    public function updateAvatar(Request $request){
        $this->validate($request,[
            'avatar'=>'required|image'
        ]);
        $user_id=auth()->user()->id;

        if($request->hasFile('avatar')){
            $file=$request->file('avatar');
            $extention=$file->getClientOriginalExtension();
            $fileName=time().'.'.$extention;
            $file->move('images',$fileName);

        }
        $data= Profile::where('user_id',$user_id);
        $data->update([
            'avatar'=>$fileName
        ]);


        return response()->json($data);

    }
    public function getAvatar( ){
        $profile= Profile::get();
        return response()->json($profile);
    }
    public function getdetails(){
        $user_id=auth()->user()->id;
        $profile= User::where('id',$user_id)->get();
        return response()->json($profile);
    }
    public function updatedetails(Request $request){
        $user_id=auth()->user()->id;
        $data= Profile::where('user_id',$user_id);
        $mata= User::where('id',$user_id);
        $data->update([
            'address'=>$request->address,
            'mobile'=>$request->mobile,
            'exprience'=>$request->exprience,
            'bio'=>$request->bio,
            'gender'=>$request->gender,
            'dob'=>$request->dob,
        ]);
        $mata->update([
            'name'=>$request->name,
        ]);
       // return redirect()->back();
        return response()->json($data);
    }
    public function updateCoverLetter(Request $request){
        $this->validate($request,[
            'cover_leter'=>'required'
        ]);
        $user_id=auth()->user()->id;
        $path = $request->file('cover_leter')->store('public/files');
        $data= Profile::where('user_id',$user_id);
        $data->update([
            'cover_leter'=>$path
        ]);
        return redirect()->back();
        return response()->json($data);
    }
    public function updateResume(Request $request){
        $this->validate($request,[
            'resume'=>'required'
        ]);
        $user_id=auth()->user()->id;
        $path = $request->file('resume')->store('public/files');
        $data= Profile::where('user_id',$user_id);
        $data->update([
            'resume'=>$path
        ]);
        return redirect()->back();
        return response()->json($data);
    }
}
