@extends('layout.app')

@section('content')
<div class="container">
    @include('inc.messages')
    {!! Form::open(['action' => 'EditProfileController@store', 'method' => 'POST']) !!}
    <div class="row">
        <div class="mx-auto">
            <img src="https://pbs.twimg.com/profile_images/822547732376207360/5g0FC8XX_400x400.jpg" width="200" height="200" class="mx-auto rounded-circle d-block" alt="avatar"/>
            <button class="form-control">New Avatar (preferably 300x300)</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 order-lg-2">
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <div class="row">
                        <div class="col-md-6">
                            {{Form::label('name', 'Name', ['class' => 'h6'])}}
                            {{Form::text('name', $profile->name, ['class' => 'form-control'])}}
                            {{Form::label('surname', 'Surname', ['class' => 'h6'])}}
                            {{Form::text('surname', $profile->surname, ['class' => 'form-control'])}}
                            {{Form::label('birth', 'Birthdate', ['class' => 'h6'])}}
                            {{Form::date('birth', $profile->birth, ['class' => 'form-control'])}}
                            {{Form::label('biography', 'Biography (about you)', ['class' => 'h6'])}}
                            {{Form::textarea('biography', $profile->biography, ['class' => 'form-control'])}}
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
                    </div>
                    <!--/row-->
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        {{Form::submit('Submit',['class' => 'btn btn-primary mx-auto'])}}
    </div>
    {!! Form::close() !!}
</div>

<br></br>

@endsection