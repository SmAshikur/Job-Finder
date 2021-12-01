<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('employer',['except'=>array('welcome','show','alljobs')]);
    }
    public function welcome(){
        $jobs= Job::get()->take(10);
        $coms= Company::get()->take(12);
      return view ('welcome',compact('jobs','coms'));
    }
    public function alljobs(Request $request){
        $keyword=request('title');
        $type=request('type');
        $cat=request('category_id');
        $address=request('address');
        $cats=Category::get();
        if($keyword||$type||$cat||$address){
            $jobs=Job::where('title','LIKE','%'.$keyword.'%')
            ->orWhere('type',$type)->orWhere('category_id',$cat)
            ->orWhere('address',$address)->paginate(10);
            return view ('job.alljobs',compact('jobs','cats'));
        }else{
            $jobs= Job::paginate(10);
            $cats=Category::get();
            return view ('job.alljobs',compact('jobs','cats'));
        }
    }
    public function index()
    {
      $jobs= Job::where('user_id',auth()->user()->id)->paginate(3);
      return view ('job.myjobs',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats=Category::get();
        //dd($cats);
        return view('job.post',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id=auth()->user()->id;
        $company=Company::where('user_id',$user_id)->first();
        //return $request;
        Job::create([
            'user_id'=>$user_id,
            'company_id'=> $company->id,
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'description'=>$request->description,
            'address'=>$request->address,
            'position'=>$request->position,
            'roles'=>$request->roles,
            'type'=>$request->type,
            'status'=>$request->status,
            'last_date'=>$request->last_date,

        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('job.show',compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }

    public function apply(Request $request, $id){
        $jobId = Job::find($id);
        $user_id=auth()->user()->id;
        $jobId->users()->attach($user_id);
        return redirect()->back();
    }
    public function applicant(){
        $user_id=auth()->user()->id;
        $applicant=Job::has('users')->where('user_id',$user_id)->paginate(4);
        return view('job.applicant',compact('applicant'));
    }


}
