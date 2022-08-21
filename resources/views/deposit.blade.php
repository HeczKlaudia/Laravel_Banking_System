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
        <div class="row small-up-2 medium-up-3 large-up-4">
            <div class="column">
                <div class="card-body">
                    <h2 class="cim">Befizetés saját számlára</h2>
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                    @endforeach
                </div>
                <div class="szamla-adatok">
                    <form id="addform" action="{{ route('deposit-amount') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="adatok-div">
                            <label for="">Kedvezményezett számlaszáma:</label>
                            <input type="text" id="szamlaszam" name="szamlaszam">
                        </div>
                        <div class="adatok-div">
                            <div class="row">
                                <div class="col">
                                    <label for="">Vezetéknév:</label>
                                    <input type="text" id="vezeteknev" name="vezeteknev">
                                </div>
                                <div class="col">
                                    <label for="">Keresztnév:</label>
                                    <input type="text" id="keresztnev" name="keresztnev">
                                </div>
                            </div>
                        </div>
                        <dl>
                            <p>Befizetett összeg:</p>
                            <input type="text" id="osszeg" name="osszeg">
                        </dl>
                        <button type="submit" class="btn btn-primary">Küld</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection