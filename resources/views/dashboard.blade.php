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
        <h3>Üdvözöljük az OB oldalán!</h3>
        <div class="card-body">
            @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
        <div class="row small-up-2 medium-up-3 large-up-4">
            <div class="column">
                <h4 class="szamlaimCim">Számláim</h4>
                <div class="szamlainfo">
                    <div class="dashboard-keret">
                        @foreach($szamlak as $szamla)
                        <div class="dashboard-szamla-adatok">
                            <p class="szamlanev">{{$szamla->tipus}}</p>
                            <p class="egyenleg">{{$szamla->egyenleg}} Ft</p>
                            <p>{{$szamla->hitelkeret}} Ft</p>
                            <a class="transferGomb" href="{{ url('/transfer/'.$szamla->id) }}">Tranzakció létrehozása ></a><br><br>
                        </div>
                        <br>
                        @endforeach
                    </div>
           <!--          <div class="dashboard-keret2">
                        <h4>Tranzakciók</h4>
                        <div class="dashboard-tranzakcio-adatok">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <div class="icon-adat">
                                            <i class="fa-solid fa-money-bills"></i>
                                        </div>
                                    </div>
                                    <p class="tranz-adatok">
                                        <span class="adat1">Tesco önkiszolgáló</span>
                                        <span class="datum">2022.08.10.</span>
                                    </p>
                                    <p class="ar">-2600 Ft</p>
                                </li>
                                <li>
                                    <div class="icon">
                                        <div class="icon-adat">
                                            <i class="fa-solid fa-money-bills"></i>
                                        </div>
                                    </div>
                                    <p class="tranz-adatok">
                                        <span class="adat1">Tesco önkiszolgáló</span>
                                        <span class="datum">2022.08.10.</span>
                                    </p>
                                    <p class="ar">-2600 Ft</p>
                                </li>
                                <li>
                                    <div class="icon">
                                        <div class="icon-adat">
                                            <i class="fa-solid fa-money-bills"></i>
                                        </div>
                                    </div>
                                    <p class="tranz-adatok">
                                        <span class="adat1">Tesco önkiszolgáló</span>
                                        <span class="datum">2022.08.10.</span>
                                    </p>
                                    <p class="ar">-2600 Ft</p>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

</div>
@endsection