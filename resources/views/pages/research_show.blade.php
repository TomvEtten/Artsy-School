@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav">
            <div class="card">
                <div class="card-body">
                    <center>
                        <small>Posted by</small>
                        <h3 class="media-heading"> @if(isset($research->profile)){{{$research->profile->name. ' ' .$research->profile->surname}}} @endif </h3>
                        <img src="{{$research->profile->picture}}" name="aboutme" width="140" height="140" border="0" class="rounded-circle">
                        <br/>
                        <small> 
                            {{($research->profile->school->afkorting)}}
                            -
                            {{($research->profile->rank->name)}}
                        </small>
                        <br/>
                        <span class="badge badge-success">{{
                            $research::where('user_id',$id =$research->profile->user->id)->count()}}
                            Researches <i class="fa fa-bars" aria-hidden="true"></i></span>
                        <span class="badge badge-danger">
                            {{
                              $count = DB::table('comment')->where('user_id', $research->profile->user->id)->count() }}
                            Comments <i class="fa fa-comment" aria-hidden="true"></i></span>
                        <span class="badge badge-info"> @if ($research->profile->aantalLikes == 0)
                            0
                            @else 
                            {{$research->profile->aantalLikes}} @endif Likes <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>

                    </center>
                    </center>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
<!--                    <center>
                        <small>Helper</small>
                        <h3 class="media-heading">Mr Willem </h3>
                        <img src="http://www.sevendays.nl/sites/default/files/styles/node_image/public/ANP-23135097.jpg?itok=y2k9XPjW" name="aboutme" width="140" height="140" border="0" class="rounded-circle">
                        <br/>
                        <small>HvA - Teacher</small>
                        <br/>
                        <span class="badge badge-success">2 Researches <i class="fa fa-bars" aria-hidden="true"></i></span>
                        <span class="badge badge-danger">11 Comments <i class="fa fa-comment" aria-hidden="true"></i></span>
                        <span class="badge badge-info">311 Likes <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                    </center>-->
                </div>
            </div>
        </div>

        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <h2>{{$research->title}}</h2>
                    <small> Posted by @if(isset($research->profile)){{{$research->profile->name. ' ' .$research->profile->surname}}} @endif <span class="fa fa-pencil"></span>{{$research->created_at}}<span class="fa fa-clock-o"></span></small>

                    <div class="text-right">
                        <a href='{{url('research/'.$research->id.'/edit')}}'><span class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
                        <span class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                    </div>
                    <!--<h5><span class="badge badge-success">Lorem</span></h5><br>-->

                    <p>
                    <div class="media">
                        <div class="media-body">
                            @if(isset($research->youtube_url)){!! Embed::make($research->youtube_url)->parseUrl()->getIframe() !!}}} @endif
                        </div>
                    </div>
                    </p>

                    <p class="main-content-project">{!!$research->content!!}
                    </p>
                    <!--this is a comment format-->
                    <hr>
                    @foreach($research->comments as $comment)

                    <div class="row">
                        <div class="col-sm-2 col-md-2 col-lg-2 text-left">
                            <img src="{{$comment->profile->picture}}" width="100" height="100" border="0" alt="Avatar">
                        </div>
                        <div class="col-sm-2 col-md-8 col-lg-4 text-left">
                            <h4>{{$comment->profile->name}}</h4>
                            <small>HvA - Student</small>
                            <br/>
                            <span class="badge badge-success">{{
                            $research::where('user_id',$id =$comment->profile->user->id)->count()}} Researches <i class="fa fa-bars" aria-hidden="true"></i></span>
                            <span class="badge badge-danger">  {{$comment::where('user_id',$id =$comment->profile->user->id)->count()}} Comments <i class="fa fa-comment" aria-hidden="true"></i></span>
                            <span class="badge badge-info"> @if ($comment->profile->aantalLikes == 0)
                                0
                                @else 
                                {{$research->profile->aantalLikes}} @endif  Likes <i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                        </div>
                        <div class="col-sm-2 col-md-8 col-lg-6 text-right">
                            <small>{{$comment->created_at}}</small><br/>
                        </div>

                    </div>

                    <div class = "row">
                        <div class="col-sm-9  col-lg-12">
                            <div class="comment">
                                <br/>
                                {{$comment->content}}
                            </div>
                        </div>
                    </div>
                    <hr>

                    @endforeach

                    <h4>Leave a Comment:</h4>
                    @include('inc.messages')
                    {!! Form::open(['action' => ['CommentController@store'], 'method' => 'POST']) !!}


                    <div class="form-group">
                        {{Form::label('content', 'Content')}}
                        {{Form::textarea('content', '', ['id' => 'article-ckeditor', 'class' => 'form-control ckeditor','rows' => '5', 'placeholder' => 'Content'])}}
                    </div>


                    {{form::hidden('id', $research->id)}}
                    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                    {!! Form::close() !!}                           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection