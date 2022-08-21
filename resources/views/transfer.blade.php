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
                    <h2 class="cim">Felhasználók közötti átutalás</h2>
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                    @endforeach
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                    <p class="alert alert-danger">{{ session('message') }}</p>
                    @endif
                </div>

                <form class="" method="POST" action="{{ route('final_process',[$szamla->id]) }}">
                    @csrf
                    <div class="szamla-adatok">
                        <div class="form-row">
                            <div class="form-group col-md-6 adatok-div">
                                <p>Számlaszám:</p>
                                <input type="text" disabled value="{{ old('id') ?? $szamla->szamlaszam }}" id="kuldoSzamla" name="kuldoSzamla" class="kuldoSzamla">
                            </div>
                            <div class="form-group col-md-6 adatok-div">
                                <p>Elérhető egyenleg:</p>
                                <input type="text" disabled value="{{ old('id') ?? $szamla->egyenleg }}" id="egyenleg" name="egyenleg" class="egyenleg">
                            </div>
                        </div>
                        <p class="">Címzett:</p>
                        <div class="form-row">
                            <div class="form-group col-md-4 adatok-div">
                                <input type="text" id="cimzettVezetekNev" name="cimzettVezetekNev" class="cimzettVezetekNev" placeholder="Kiss">
                            </div>
                            <div class="form-group col-md-4 adatok-div">
                                <input type="text" id="cimzettKeresztNev" name="cimzettKeresztNev" class="cimzettKeresztNev" placeholder="Pista">
                            </div>
                            <div class="form-group col-md-4 adatok-div">
                                <input type="text" id="cimzettSzamla" name="cimzettSzamla" class="cimzettSzamla" placeholder="117-53252-2352-5235-00000000">
                            </div>
                        </div>
                        <dl>
                            <p class="szoveg">Összeg:</p>
                            <div class="form-group osszegMezo">
                                <input type="text" id="osszeg" name="osszeg" class="osszeg" placeholder="3000">
                            </div>
                            <p>Üzenet:</p>
                            <textarea name="text" id="text" cols="30" rows="10"></textarea>
                        </dl>
                        <button type="submit" class="btn btn-primary">Küld</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>
@endsection