@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @if(!empty(auth()->user()->company->cover_photo))
                <img src="{{asset('images/'.auth()->user()->company->cover_photo)}}" height="250px" width="100%">
           @else
                <img src="{{asset('images/ashik.jpg')}}" height="400px" width="90%">
           @endif

            </div>

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
                           @foreach ($company->jobs as $job )
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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
