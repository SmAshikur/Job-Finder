@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{$job->title}}
                </div>
                <div class="card-body">
                   <div>
                    {{$job->description}}
                   </div>
                   <div>
                    <div class="m-2">
                        Company :  <a href="{{url('company/'.$job->company->id)}}"> {{$job->company->cname}}</a>

                   </div>
                   <div>

                   </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    {{$job->type}}
                    @if(auth::check()&&Auth::user()->type=="seeker")
                    @if(!$job->hello())
                        <form action="{{url('apply/'.$job->id)}}" method="post">@csrf
                            <button type="submit" class="btn btn-success">apply</button>
                        </form>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
