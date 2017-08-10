@extends('default')

@section('title', $pageTitle)

@section('content')

    @section('h1')
    <h1>Raccourcir un lien</h1>
    @show

    @yield('before_form')

    <form action="{{ route('link.store') }}" method="post">
    <div class="form-group">
        {{ csrf_field() }}
        <label for="url">Lien à raccourcir</label>
        <input type="text" name="url" placeholder="http://..." class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Raccourcir</button>
    </div>
    </form>

@endsection