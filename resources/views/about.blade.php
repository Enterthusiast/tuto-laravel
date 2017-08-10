@extends('default')

@section('title', $pageTitle)

@section('content')

section content
{{$title}} {{$text}}

Fruits
<ul>
@foreach($items as $item)
<li>{{$item}}</li>
@endforeach
</ul>

Animaux
<ul>
@forelse($animals as $animal)
<li>{{$animal}}</li>
@empty
<li>Pas d'animaux</li>
@endforelse
</ul>

Include
@include('include')

@endsection

@section('sidebar')

@parent

section sidebar

@endsection