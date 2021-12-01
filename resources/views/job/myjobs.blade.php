@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between" >
                    <a href="{{url('job/create')}}" class="btn btn-success"> back</a>
                    <a href="{{url('applicant')}}" class="btn btn-success"> company</a>
                </div>
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
                                <th>{{$job->title,5}}</th>
                                <th>{{$job->description}}</th>
                                <th>{{$job->title}}</th>
                                <th>{{$job->title}}</th>
                                <th><a href="{{url('job/'.$job->id)}}" class="btn btn-success">Apply</a> </th>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    {{$jobs->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

