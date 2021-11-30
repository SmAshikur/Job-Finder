@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between" >
                    <a href="{{url('company')}}" class="btn btn-success"> back</a>
                    <a href="{{url('job')}}" class="btn btn-success">  my jobs</a>
                </div>
                <form action="{{url('job')}}" method="post">@csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Job Title </label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter job title">
                                </div>
                                <div class="form-group">
                                    <label>Job Positiom </label>
                                    <input type="text" class="form-control" name="position" placeholder="Enter job title">
                                </div>
                                <div class="form-group">
                                    <label>Select Category </label>
                                    <select class="form-control" name="category_id" >
                                        @foreach ($cats as $cat )
                                        <option value="{{$cat->id}}" >  {{$cat->category}}  </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Office Address </label>
                                    <textarea class="form-control" name="address" placeholder="Enter job title">

                                    </textarea>
                                </div>
                                <div class="form-group ">
                                    <label>Satatus  </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="status" value="1"> &nbsp; ON &nbsp;&nbsp;
                                    <input type="radio" name="status" value="0"> &nbsp; OFF
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Job Type </label>
                                    <input type="text" class="form-control" name="type" placeholder="Enter job title">
                                </div>
                                <div class="form-group">
                                    <label>Select Job Role </label>
                                    <select class="form-control" name="roles" >
                                        <option value="test">test    </option>
                                        <option value="test2">test2   </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Job Description </label>
                                    <textarea class="form-control" name="description" placeholder="Enter job title">

                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Job Dead line </label>
                                    <input type="date" class="form-control" name="last_date" placeholder="Enter job title">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">Post a Job</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

