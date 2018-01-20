@extends('layout.app')

@section('content')

<div class="background">
    <div class="container">
        @include('inc.messages')
        
        <div class="jumbotron">
            <h1 class="display-3">
                @guest
                Hi there!
                @else
                Hi {{Auth::user()->profile->name}}
                @endguest
            </h1>
            <p class="lead">Welcome to Artsy.</p>
        </div>
        <div class="row">
            @if(count($researches) > 0)
            @foreach($researches as $research)
            <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
                <div class="card">
                    <div class="item">
                        <img class="card-img-top" src="{{$research->image_url}}">
                    </div>
                    <div class="card-body bg-dark">
                        <h5 class="text-bold">{{$research->title}}</h5>

                        <br/>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modal{{$research->id}}">Summary</button>
                        <a href="{{url('/research')}}/{{$research->id}}"><button type="button" class="btn btn-primary float-right">More</button></a>
                        <br/>
                        <div class="card-body-text">{{
                              $count = DB::table('comment')->where('research_id', $research->id)->count() }}
                            <i class="fa fa-comment" aria-hidden="true"></i> &nbsp; &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-pencil" aria-hidden="true"></i> @if(isset($research->profile)){{{$research->profile->name. ' ' .$research->profile->surname}}} @endif
                            <div class="float-right"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$research->created_at}}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="Modal{{$research->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$research->title}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{$research->summary}}
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="{{url('/research')}}/{{$research->id}}"> <button type="button" class="btn btn-primary">More</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @else
        </div>
        <div>
            <center><div class="alert alert-danger"><h1>No research found :(</h1></div></center>
            @endif


        </div>
        @if(count($researches) > 0)
        <div class="float-right">
            {{ $researches->links() }}
        </div>
        <div class="clearfix"></div>

        @endif
    </div>
</div>




@endsection