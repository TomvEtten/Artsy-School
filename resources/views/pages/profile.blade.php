@extends('layout.app')

@section('content')
<div class="container">
    <div class="row my-2">
        <div class="col-lg-4 order-lg-1 text-center">
            <img src="https://pbs.twimg.com/profile_images/822547732376207360/5g0FC8XX_400x400.jpg" width="200" height="200" class="mx-auto rounded-circle d-block" alt="avatar">
            <br/>
            <h4>Barack Obama</h4>
            @if($profile == Auth::user()->profile)
            <a href="/Artsy_Laravel_PHP/public/edit_profile/{{($profile->user_id)}}" class="btn btn-primary">Edit</a>
            @endif
        </div>
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">Barack Obama</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Complete name:</h6>
                            <p>
                                Barack Obama
                            </p>
                            <h6>Username:</h6>
                            <p>
                                @baroba14
                            </p>
                            <h6>Birthdate</h6>
                            <p>
                                13-05-1953
                            </p>
                        </div>

                        <div class="col-md-6">
                            <h6>Rank</h6>
                            <p>
                                Student,  Studentnumber: 80074131
                            </p>

                            <h6>School</h6>
                            <p>
                                Hogeschool van Amsterdam
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6>Biography</h6>
                            <p>
                                Ik ben een student en ik houd van kunstwerk maken.
                            </p>

                        </div>
                        <div class="col-md-6">
                            <h6>Skills</h6>
                            <a href="#" class="badge badge-dark badge-pill">html5</a>
                            <a href="#" class="badge badge-dark badge-pill">react</a>
                            <a href="#" class="badge badge-dark badge-pill">codeply</a>
                            <a href="#" class="badge badge-dark badge-pill">angularjs</a>
                            <a href="#" class="badge badge-dark badge-pill">css3</a>
                            <a href="#" class="badge badge-dark badge-pill">jquery</a>
                            <a href="#" class="badge badge-dark badge-pill">bootstrap</a>
                            <a href="#" class="badge badge-dark badge-pill">responsive-design</a>
                            <hr>
                            <span class="badge badge-success">1 Researches <i class="fa fa-bars" aria-hidden="true"></i></span>
                            <span class="badge badge-danger">2 Comments <i class="fa fa-comment" aria-hidden="true"></i></span>
                            <span class="badge badge-info">100 Likes <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                        </div>
                        <div class="col-md-12">
                            <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Researches</h5>
                            <table class="table table-sm table-hover table-striped">
                                <tbody>                                    
                                    <tr>
                                        <td>
                                            <strong>3D Kunstwerk</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Nieuwe flag</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
                </div>
            </div>
        </div>
    </div>
</div>

<br></br>

@endsection

