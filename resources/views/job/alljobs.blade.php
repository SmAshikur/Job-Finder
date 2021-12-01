@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
            <div class="card">
                <div class="card-header py-3 bg-primary">
                    <form class="form-inline" method="get" action="{{url('alljobs')}}">
                        <div class="form-group">
                            <label>Keyword</label>&nbsp;&nbsp;
                            <input type="text" name="title" class="form-control">&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="form-group">
                            <label>Type</label>&nbsp;&nbsp;&nbsp;
                            <input type="text" name="type" class="form-control">&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="form-group">
                            <label>Category</label>&nbsp;&nbsp;&nbsp;
                            <select class="form-control" name="category_id" >&nbsp;&nbsp;&nbsp;
                                @foreach ($cats as $cat )
                                <option value="{{$cat->id}}" >  {{$cat->category}}  </option>
                                @endforeach
                            </select>&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="form-group">
                            <label>Address</label>&nbsp;&nbsp;&nbsp;
                            <input type="text" name="address" class="form-control">&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="form-group">
                             <button type="submit" class="btn btn-sm btn-success">Search</button>
                        </div>
                    </form>
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
                <div class="card-footer d-flex justify-content-center bg-primary">
{{$jobs->links()}}
                </div>
            </div>
    </div>
</div>
<!-- -->


@endsection
