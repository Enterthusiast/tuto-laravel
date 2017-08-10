@extends('links/create')

@section('title', $pageTitle)

@section('h1')
<h1>Votre lien raccourci</h1>
@endsection

@section('before_form')
<strong>Raccourci</strong>
<br>
<p>{{ action('LinksController@show', $link) }}</p>
<br>
Testez le : <a href="{{ action('LinksController@show', $link) }}">{{ action('LinksController@show', $link) }}</a>
@endsection