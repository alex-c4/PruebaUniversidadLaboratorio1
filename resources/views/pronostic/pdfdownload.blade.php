<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quinielaName }}</title>
    <link rel="stylesheet" href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}">   
    <style>
        .wc-100{
            width: 100px;
            vertical-align: middle !important;
        }

        .wc-30{
            width: 40px;
            font-weight: bold;
            text-align: center;
            font-size: larger;
            vertical-align: middle !important;
        }

        h2{
            color: #9e7622;
        }
    </style>
</head>
<body>
<div class=container>

<img src="{{ asset('img/logo3_03.png') }}" height="60px" alt="" srcset="">
<h2>{{ $quinielaName }}</h2>
<!-- <div class="row"> -->
<!-- <div class="col-12"> -->

<table class="table table-sm">
@foreach($users as $user)
    <thead>
        <tr class="table-secondary">
            <th scope="col">{{ $user->name }} {{ $user->lastName }}</th>
        </tr>
    </thead>
            
    <tbody>
        <tr>
            <td>
                <!-- aquiva la tabla de pronosticos -->
                <table class="table table-sm table-striped">
                    <tbody>
                    @php($key = 0)
                    
                    @foreach($pronostics as $pronostic)
                        @if($user->id == $pronostic->id_user)
                        {{ $key += 1 }}
                        <tr>
                            <th class="wc-30">{{ $key }}</th>
                            <td class="text-right wc-100">@if($pronostic->nombre_club_1 == "") {{ $pronostic->nombre_club_1_long }} @else {{ $pronostic->nombre_club_1 }} @endif</td>
                            <td class="text-center wc-30">{{ $pronostic->pronostic_club_1 }}</td>
                            <td class="text-center wc-30">{{ $pronostic->pronostic_club_2 }}</td>
                            <td class="text-left wc-100">@if($pronostic->nombre_club_2 == "") {{ $pronostic->nombre_club_2_long }} @else {{ $pronostic->nombre_club_2 }} @endif</td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </td>
        </tr>
        
    </tbody>
@endforeach
    </table>

    
<!-- </div> -->
<!-- </div> -->


</div>
</body>
</html>