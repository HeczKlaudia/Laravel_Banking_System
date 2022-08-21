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
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif


                <div class="container-fluid px-1 py-5 mx-auto">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-5 text-center">
                            <h3>Adatok ellenőrzése</h3>

                            <form class="form-card" method="POST" action="{{ route('submitted',[$sender, $info->szamlaszam, $sender_remaining, $transfer_amount, $text]) }}">
                                @csrf
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Kedvezményezett számlaszáma<span class="text-danger"> *</span></label>
                                        <input type="text" id="fname" name="fname" value="{{ $szamla_ell }}" disabled>
                                    </div>
                                </div>
                                <div class=" row justify-content-between text-left">
                                    <div class="form-group col-sm-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Vezetéknév<span class="text-danger">*</span></label>
                                        <input type="text" id="fname" name="fname" value="{{ $vezeteknev }}" disabled>
                                    </div>
                                    <div class="form-group col-sm-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Vezetéknév<span class="text-danger">*</span></label>
                                        <input type="text" id="fname" name="fname" value="{{ $keresztnev }}" disabled>
                                    </div>
                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-12 flex-column d-flex">
                                        <label class="form-control-label px-3">Üzenet
                                            <span class="text-danger">*</span>

                                            <textarea disabled placeholder="{{ $text }}" name="text" id="text"></textarea>
                                    </div>
                                </div>

                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Küldött összeg<span class="text-danger">
                                                *</span></label> <input type="text" id="fname" name="fname" value="{{ $transfer_amount }} Ft" disabled> </div>

                                </div>
                                <div class="row justify-content-between text-left">
                                    <div class="form-group col-sm-12 flex-column d-flex"> <label class="form-control-label px-3">Új egyenleg<span class="text-danger">
                                                *</span></label> <input type="text" id="fname" name="fname" value="{{ $sender_remaining }} Ft" disabled> </div>

                                </div>


                                <div class="row justify-content-center">
                                    <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary">Confirm Transfer</button> </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</div>
@endsection