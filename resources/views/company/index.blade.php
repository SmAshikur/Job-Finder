@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pb-3">
        <div class="col-md-2">

            @if(!empty(auth()->user()->company->logo))
                 <div id="ming"></div>
            @else
                 <img src="{{asset('images/ashik.jpg')}}" height="200px" width="90%">
            @endif
        </div>
        <div class="col-md-10 ">

            @if(!empty(auth()->user()->company->cover_photo))
                 <div id="ping" class="-flex align-item-center"></div>
            @else
                 <img src="{{asset('images/ashik.jpg')}}" height="400px" width="90%">
            @endif
        </div>
    </div>
    <div class="row ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   <div class="row">
                        <div class="col-md-6">
                            <form id="updateLogo" action="" method="post" enctype="multipart/form-data">@csrf

                                <input class="fo" type="file" name="logo">
                                <span id="imageErr" class="text-danger py-4"></span>


                                <button type="submit" class="btn btn-success btn-sm">Change Company Logo</button>

                            </form>
                        </div>
                        <div class="col-md-6">
                            <form id="updateCover" action="" method="post" enctype="multipart/form-data">@csrf

                                <input class="fo" type="file" name="cover_photo">
                                <span id="imageErr" class="text-danger py-4"></span>


                                <button type="submit" class="btn btn-success btn-sm">Change Company Banner</button>

                         </form>
                        </div>
                   </div>
                </div>
                <form action="{{url('company/details/update')}}" method="post" id="comProfileDetails" enctype="multipart/form-data"> @csrf
                    <div class="card-body">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" name="phone" value="{{auth()->user()->company->phone}} " class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Website</label>
                                <input type="text" name="website" value="{{auth()->user()->company->website}} " class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Slogan</label>
                                <input type="text" name="slogan" value=" {{auth()->user()->company->slogan}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control">{{auth()->user()->company->address}} </textarea>
                            </div>
                            <div class="form-group">
                                <label>Des</label>
                                <textarea name="description" class="form-control">{{auth()->user()->company->description}}</textarea>
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
                        Company Name : <span id="cname"></span>
                    </div>
                    <div class="pb-3">
                        Email : <span id="cemail"></span>
                    </div>
                    <div class="pb-3">
                        Mobile : <span id="cmobile"></span>
                    </div>
                    <div class="pb-3">
                        Website : <span id="cwebsite"></span>
                    </div>
                    <div class="pb-3">
                        Slogan : <span id="cslogan"></span>
                    </div>
                    <div class="pb-3">
                        Address : <span id="caddress"></span>
                    </div>
                    <div class="pb-3">
                        Description :<span id="cdes"></span>
                    </div>
                    <div class="pb-3">
                        <b>Post Job</b>
                        <a href="{{url('job/create')}}" class="btn btn-success">clicl me to post</a>
                    </div>
                    <div class="pb-3">
                        Go to my page :<a href="{{url('company/'.auth()->user()->company->id)}}"> lets go </a>
                    </div>
                    <div class="pb-3">



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
