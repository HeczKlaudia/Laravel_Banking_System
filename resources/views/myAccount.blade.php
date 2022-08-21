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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    + Másik banki számla hozzáadása
                </button>
            </div>
        </div>

        <script>
            $('#myModal').on('shown.bs.modal', function() {
                $('#myInput').trigger('focus')
            })
        </script>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Banki számla hozzáadása</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addform" action="{{ route('uj_szamla') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <select name="bank_id" id="bankok">
                                @foreach($bankok as $bank)
                                <option value="{{$bank->id}}">{{$bank->nev}}</option>
                                @endforeach
                            </select>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="szamlanev">Számla neve</label>
                                <input type="text" class="form-control" id="szamlanev" name="szamlanev" placeholder="pl.: Revolut számla">
                            </div>
                            <div class="form-group">
                                <label for="szamlaszam">Számlaszám</label>
                                <input type="text" class="form-control" id="szamlaszam" name="szamlaszam" placeholder="pl.: 117-12345-1111-2222-00000000">
                            </div>
                            <div class="form-group">
                                <label for="iban">Számlaszám IBAN formátumban</label>
                                <input type="text" class="form-control" id="iban" name="iban" placeholder="pl.: HU48 117-12345-1111-2222-00000000">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezárás</button>
                                <button type="submit" class="btn btn-primary">Mentés</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row small-up-2 medium-up-3 large-up-4">
            <div class="column">

                @foreach($szamlak as $szamla)
                <div class="szamlaim-adatok">
                    <div class="adatok-div">
                        <p>Felhasználható egyenleg: <span class="egyenleg">{{$szamla->egyenleg}} Ft</span></p>
                        <p>Hitelkeret: <span class="hitelkeret">{{$szamla->hitelkeret}} Ft</span></p>
                    </div>
                    <div class="adatok-div">
                        <p>Számlaszám: <span class="szamlaszam">{{$szamla->szamlaszam}}</span></p>
                        <p>Számla típusa: <span class="tipus">{{$szamla->tipus}}</span></p>
                    </div>
                    <dl>
                        <h6>Azonosítók nemzetközi utaláshoz</h6>
                        <p>IBAN: <span class="iban">{{$szamla->iban}}</span></p>
                    </dl>
                </div>
                <br>
                @endforeach
            </div>

        </div>
    </div>

</div>
@endsection