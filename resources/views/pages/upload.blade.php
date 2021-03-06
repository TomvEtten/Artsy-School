@extends('layout.app')

@section('content')
<script>
    $(document).on('ready', function () {
        $("#input-b5").fileinput({
            showCaption: false
        });
    });
    $(document).ready(function () {
        $("button").click(function () {
            alert("Value: " + $("#title").val() + $("#summary").val());
        });
    });
</script>
<script src="../../vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="../../vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script>
    $('textarea').ckeditor();
//         $('.textarea').ckeditor(); // if class is prefered.
</script>
<div id="achtergrondupload">
    <div class="container ">
        <br/>

        <div class="card text-left"  id="uploadscreen">
            <div class="card-body">
                <h4 class="card-title">Upload</h4>
                @include('inc.messages')
                {!! Form::open(['action' => 'ResearchController@index', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('title', 'Titel')}}
                    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>
                <div class="form-group">
                    {{Form::label('summary', 'Summary')}}
                    {{Form::textarea('summary', '', ['class' => 'form-control','rows' => '5', 'placeholder' => 'Summary'])}}
                </div>
                <div class="form-group">
                    {{Form::label('content', 'Content')}}
                    {{Form::textarea('content', '', ['id' => 'article-ckeditor', 'class' => 'form-control ckeditor','rows' => '5', 'placeholder' => 'Content'])}}
                </div>
                <div class="form-group">
                    {{Form::label('image_url', 'Image URL')}}
                    {{Form::text('image_url', '', ['class' => 'form-control', 'placeholder' => 'Image URL'])}}                </div>
                
                <div class="form-group">
                    {{Form::label('youtube_url', 'Youtube URL')}}
                    {{Form::text('youtube_url', '', ['class' => 'form-control', 'placeholder' => 'Youtube URL'])}}                </div>
                
                <div class="form-group">
                    {{Form::label('type', 'Type')}}
                    {{Form::select('type', ['arts' => 'Arts', 'science' => 'Science', 'other' => 'Other'],  null, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('School', 'School')}}
                    @foreach($schools as $school)
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="{{$school->id}}">
                            {{$school->name}}
                        </label>
                    </div>
                    @endforeach
                </div>


                {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
</div>
<br/>
@endsection