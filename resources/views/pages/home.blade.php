@extends('layouts.main')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Contact Book</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias culpa delectus eaque id impedit, laboriosam porro repellat suscipit tempora! Cumque dolor dolore dolorem, dolores molestiae placeat praesentium vero voluptatem?</p>
        <hr class="my-4">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam architecto consequatur consequuntur dolores et fugit illum, incidunt, laboriosam molestias non nulla odit officia quibusdam quis ratione. Cumque mollitia pariatur voluptatibus..</p>
        <a class="btn btn-primary btn-lg" href="{{ route('import') }}">Import new</a>
        <a class="btn btn-success btn-lg" href="{{ route('contacts') }}">Show all contacts</a>
    </div>
@endsection
