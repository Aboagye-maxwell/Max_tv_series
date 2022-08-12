@extends('layouts.blog')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create" class="btn btn-outline-primary pl-5 pr-5 float-right">New Post</a>
                    <h1>Your Blog Post</h1>
                        @if(count($posts)>0)
                            <table class="table table-striped">
                                @foreach($posts as $post)
                                    <tr>
                                        <th>{{$post->title}}</th>
                                        <th><a href="/posts/{{$post->id}}/edit">Edit</a></th>
                                        <th>Title</th>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <p>You have no posts</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
