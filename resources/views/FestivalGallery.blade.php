@extends('master')

@section('titel','Festivals in 2021, 2022 en 2023!')

@section('inhoud')

@foreach ($festivals as $festival)
    <div style="float:left">
        <h3>{{ $festival->titel }}</h3>
        <a href="/festivals/{{$festival->id}}">
           <img src="{{ $festival->foto }}" alt="Foto niet gevonden" height='350'/>
        </a>
        <p><strong>€ {{ $festival->prijs }}</strong></p>
        <p><strong>{{ $festival->stad }}</strong></p>
        
    </div>
@endforeach

@stop