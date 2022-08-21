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
                    + Felhasználó hozzáadása
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Felhasználó hozzáadása</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addform" action="{{ route('uj_felhasznalo') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="last_name">Vezetéknév</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Nagy">
                            </div>
                            <div class="form-group">
                                <label for="first_name">Keresztnév</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="János">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="nagyjani@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Telefonszám</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="06201231212">
                            </div>
                            <div class="form-group">
                                <label for="username">Felhasználónév</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="nagyjani">
                            </div>
                            <div class="form-group">
                                <label for="password">Jelszó</label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="*************">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezárás</button>
                        <button type="submit" class="btn btn-primary">Mentés</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row small-up-2 medium-up-3 large-up-4">
            <div class="column">
                <div class="szamlainfo">
                    <div class="dashboard-keret">
                        <h4>Felhasználók adatai</h4>
                        <div class="admin-felhasznalok">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection