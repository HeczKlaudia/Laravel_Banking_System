@extends('layouts.main')

@section('content')

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<div class="off-canvas-content" data-off-canvas-content>
    <div class="title-bar hide-for-large">
        <div class="title-bar-left">
            <button class="menu-icon" type="button" data-toggle="menu"></button>
            <span class="title-bar-title">Menü</span>
        </div>
    </div>
    <div class="body">
        <div class="callout primary">
            <div class="row column">
                <h1>Főoldal</h1>
            </div>
        </div>
        <div class="row small-up-2 medium-up-3 large-up-4">
            <div class="column">
                <p class="fooldalSzoveg">További menüpontok eléréséhez kérjük jelentkezzen be!</p>
            </div>
        </div>
    </div>

</div>
@endsection