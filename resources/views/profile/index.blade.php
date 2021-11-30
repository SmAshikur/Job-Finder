@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   <div class="row">
                       <div class="col-md-5">
                           @if(!empty(auth()->user()->profile->avatar))
                                <div id="king"></div>
                           @else
                                <img src="{{asset('images/ashik.jpg')}}" height="200px" width="90%">
                           @endif
                       </div>
                       <div class="col-md-5 offset-md-1">
                        <div class="card">
                            <div class="card-header">
                                Upload your Profile
                            </div>
                            <form action="{{url('profile/update')}}" method="post" id="avatarImage" enctype="multipart/form-data"> @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Upload Image</label>
                                        <input class="form-control" type="file" name="avatar">
                                        <span id="imageErr" class="text-danger py-4"></span>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success">Upload</button>
                                </div>
                            </form>
                        </div>
                       </div>
                   </div>
                </div>
                <form action="{{url('details/update')}}" method="post" id="profileDetails"> @csrf
                    <div class="card-body">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" name="mobile" value="{{auth()->user()->profile->mobile}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="mr-5">Select your Gender : </label>
                                <input type="radio" value="male" name="gender" @if(auth()->user()->profile->gender=='male') checked="checked" @endif>&nbsp;&nbsp;Male &nbsp;&nbsp;
                                <input type="radio" value="female" name="gender"  @if(auth()->user()->profile->gender=='female') checked="checked" @endif >&nbsp;&nbsp;Female &nbsp;&nbsp;
                                <input type="radio" value="third-gender" name="gender"  @if(auth()->user()->profile->gender=='third-gender') checked="checked" @endif>&nbsp;&nbsp;Third Gender
                            </div><div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control" name="dob" value="{{auth()->user()->profile->dob}}">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control">{{auth()->user()->profile->address}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Exprience</label>
                                <textarea name="exprience" class="form-control">{{auth()->user()->profile->exprience}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Bio</label>
                                <textarea name="bio" class="form-control">{{auth()->user()->profile->bio}}</textarea>
                            </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <button class="btn btn-success" type="submit">Update your Details</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    User Details
                </div>
                <div class="card-body">
                    <div class="pb-3">
                        Name : <span id="name"></span>
                    </div>
                    <div class="pb-3">
                        Email : <span id="email"></span>
                    </div>
                    <div class="pb-3">
                        Mobile : <span id="mobile"></span>
                    </div>
                    <div class="pb-3">
                        Address : <span id="address"></span>
                    </div>
                    <div class="pb-3">
                        Exprience :<span id="exprience"></span>
                    </div>
                    <div class="pb-3">
                        Bio :<span id="bio"></span>
                    </div>
                    <div class="pb-3">
                    @if(empty(auth()->user()->profile->cover_leter))
                        <b>Upload Your Cover Later Fast</b>
                    @else
                        Cover Letter : <b><a href="{{Storage::url(auth()->user()->profile->cover_leter)}}">Cover Later</a></b>
                    @endif
                    </div>
                    <div class="pb-3">
                    @if(empty(auth()->user()->profile->cover_leter))
                        <b>Upload Your CV Fast</b>
                    @else
                        Resume :<b><a href="{{Storage::url(auth()->user()->profile->resume)}}">Resume</a></b>
                    @endif


                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Upload your Cover letter
                </div>
                <form action={{url('coverLetter/update')}} method="post" enctype="multipart/form-data" id="coverform">@csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Upload Cover leter</label>
                            <input class="form-control" type="file" name="cover_leter">
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>
            </div>
            <div class="card">
                <div class="card-header">
                    Upload your Resume
                </div>
                <form action={{url('resume/update')}} method="post" enctype="multipart/form-data" id="resumeform">@csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Upload Cover leter</label>
                            <input class="form-control" type="file" name="resume">
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
