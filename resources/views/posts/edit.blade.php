@extends('layouts.blog')
@section('content')
    <h1>Create Post</h1>
    <a href="/posts/{{$post->id}}" class="btn btn-outline-dark pl-5 pr-5 float-right">Go Back</a>
    {!! Form::open(['action' => ['PostController@update',$post->id],'method' => 'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title','Title',['class'=>'pt-3'])}}
        {{Form::text('title',$post->title,['class' => 'form-control','placeholder' => 'eg Check out this series'])}}
    </div>

    <div class="form-group">
        {{Form::label('body','Description')}}
        {{Form::textarea('body',$post->body,['class' => 'form-control','placeholder' => 'Messages goes here'])}}
    </div>

    <div class="form-group">
        {{Form::label('cover_image','Post image')}}
        {{form::file('cover_image')}}
    </div>

    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Update',['class' => 'btn btn-outline-success pl-5 pr-5'])}}

    {!! Form::close() !!}
@endsection
