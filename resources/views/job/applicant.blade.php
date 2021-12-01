@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between" >
                    <a href="{{url('job')}}" class="btn btn-success"> back</a>
                    <a href="{{url('company')}}" class="btn btn-success"> company</a>
                </div>
                <div class="card-body">
                    @foreach ( $applicant as $data )
                        <div class="card">
                         <div class="card-header d-flex justify-content-center">{{$data->title}}</div>

                                <div class="card-body">
                            <table class="table table-bodered">
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone </th>
                                <th>Addres</th>
                                <th>Cover Leter</th>
                                <th>CV</th>
                            </tr>
                            @foreach ($data->users as $user )
                                <tr>
                                    <td>
                                        <img src="{{asset('images/'.$user->profile->avatar)}}" height="70px" width="70px">
                                    </td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->profile->mobile}}</td>
                                    <td>{{$user->profile->address}}</td>
                                    <td>
                                        <a href="{{Storage::url($user->profile->cover_leter)}}">Cover leter</a>
                                    </td>
                                    <td>
                                        <a href="{{Storage::url($user->profile->resume)}}">Resume</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
                @endforeach
                </div>

                <div class="card-footer d-flex justify-content-center">
                    {{$applicant->links()}}
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

