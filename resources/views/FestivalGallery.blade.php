@extends('master')

@section('titel','Festivals in 2021 en 2022!')

@section('inhoud')

@foreach ($festivals as $festival)
    <div style="float:left">
        <h3>{{ $festival->titel }}</h3>
        <a href="/festivals/{{$festival->id}}">
           <img src="{{ $festival->foto }}" alt="Foto niet gevonden" height='400'/>
        </a>
        
        <p><strong>€ {{ $festival->prijs }}</strong></p>
        
    </div>
@endforeach

@stop