@extends('default')

@section('content')

<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>
<p><a href="{{ route('post.edit', $post) }}" class="btn btn-primary">Editer</a></p>

@stop