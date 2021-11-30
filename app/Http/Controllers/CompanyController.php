<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.index');
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
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
       // dd($company);
        return view('company.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }


   // employee register
   public function king(){
       return view('company.register');

}
public function kingg(Request $request){
   // return $request; die;
     $user=User::create([

        'name' => $request->cname,
         'email' => $request->email,
         'type' => $request->type,
         'password' => Hash::make($request->password),
     ]);
     Company::create([
         'cname' => $request->cname,
         'slug'=>Str::slug($request->cname),
         'user_id'=>$user->id
     ]);
     return redirect('/home');
 }

 public function updatedetails(Request $request){
    $user_id=auth()->user()->id;
    $data= Company::where('user_id',$user_id);
    $data->update([
        'address'=>$request->address,
        'phone'=>$request->phone,
        'description'=>$request->description,
        'website'=>$request->website,
        'slogan'=>$request->slogan,
        'cname'=>$request->name,
    ]);
    $mata= User::where('id',$user_id);
    $mata->update([
        'name'=>$request->name,
    ]);
    return redirect()->back();
    return response()->json($data);
 }

public function updateCover(Request $request){
    $user_id=auth()->user()->id;
    if($request->hasFile('cover_photo')){
        $file=$request->file('cover_photo');
        $extention=$file->getClientOriginalExtension();
        $fileNam=time().'.'.$extention;
        $file->move('images',$fileNam);
    }
    $data= Company::where('user_id',$user_id);
    $data->update([
        'cover_photo'=>$fileNam,
    ]);
    return response()->json($data);
}
public function updateLogo(Request $request){
    $user_id=auth()->user()->id;
    if($request->hasFile('logo')){
        $file=$request->file('logo');
        $extention=$file->getClientOriginalExtension();
        $fileNam=time().'.'.$extention;
        $file->move('images',$fileNam);
    }
    $data= Company::where('user_id',$user_id);
    $data->update([
        'logo'=>$fileNam,
    ]);
    return response()->json($data);
}

public function getCom( ){
    $profile= Company::get();
    return response()->json($profile);
}
}

