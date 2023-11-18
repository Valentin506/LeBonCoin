
<title>Profil de </title>
<link rel="stylesheet" type="text/css" href="{{asset('profile.css')}}"/> 

@extends('layouts.app')

@section('content')

<div class="userFrame">
    <div class="userInfo">
        <div id="photoUser">
            <img src={{ $todaysPhoto['image'] }} alt="photo utilisateurs">
        </div>
        <div id="basicInfo">
            <h3></h3>

        </div>
        
    </div>
    <div class="userMore">
        
    </div>
    <div class="userDetailInfo">
        
    </div>

</div>

@endsection






