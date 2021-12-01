@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <table class="table table-bodered table-striped">
                        <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Job Description</th>
                                <th>Job Type</th>
                                <th>Company Name</th>
                                <th>Apply </th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($jobs as $job )
                            <tr>
                                <th>{{Str::limit ($job->title, 12)}}</th>
                                <th>{{Str::limit ($job->description, 20)}}</th>
                                <th>{{$job->title}}</th>
                                <th>{{$job->title}}</th>
                                <th><a href="{{url('job/'.$job->id)}}" class="btn btn-success">Apply</a> </th>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
    </div>
</div>
<!-- -->

<div class="container py-5"> <a href="{{url('alljobs')}}" class="btn btn-success btn-lg" style="width: 100%"> Browse all jobs</a>
<div class="row justify-content-center  pt-5" ><h1 class="text-success">Feature Company</h1></div>
<div class="row py-5" >
   @foreach ( $coms as $com )
    <div class="col-md-4 card p-3">
            <div class="card-header">
                <div class="card-title"> {{$com->cname}}</div>
            </div>
            <div class="card-body">
                <img src="{{asset('images/1638223684.jpg')}}" width="70%" height="100px">
            </div>
            <div class="card-footer">
                <a href="{{url('company/'.$com->id)}}" class="btn btn-sm btn-success"> View company</a>
            </div>
    </div>
   @endforeach
</div>
<div class="row justify-content-center " ><h1 class="text-success">. &nbsp;&nbsp; . &nbsp;&nbsp; . &nbsp;&nbsp; . &nbsp;&nbsp; . &nbsp;&nbsp; . &nbsp;&nbsp;.</h1></div>
</div>
@endsection
