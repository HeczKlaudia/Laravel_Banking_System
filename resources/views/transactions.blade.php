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
                <h2>Tranzakciók</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Küldő/ügyintéző vezetéknév</th>
                            <th>Küldő/ügyintéző keresztnév</th>
                            <th>Terhelt kártya/folyamat leírása</th>
                            <th>Kedvezményezett vezetéknév</th>
                            <th>Kedvezményezett keresztnév</th>
                            <th>Számlaszáma</th>
                            <th>Összeg</th>
                            <th>Üzenet</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1 @endphp
                        @foreach($my_transactions as $data)
                        <tr>
                            @php $status=$data->status; @endphp
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $data->sender_last_name }}</td>
                            <td>{{ $data->sender_first_name }}</td>
                            <td>{{ $data->sender_account_id }}</td>
                            <td>{{ $data->receiver_last_name }}</td>
                            <td>{{ $data->receiver_first_name }}</td>
                            <td>{{ $data->receiver_account }}</td>
                            <td>{{ $data->amount }}</td>
                            <td>{{ $data->text }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection