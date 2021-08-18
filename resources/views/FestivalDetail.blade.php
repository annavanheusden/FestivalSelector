@extends('master')

@section('titel','Festivals in 2021, 2022 en 2023!')

@section('inhoud')
    <div style="float:left">
        <h3>{{ $festival->titel }}</h3>
        <img src="{{ $festival->foto }}" alt="Foto niet gevonden" height='350'/>
        <p>{{ $festival->CovidInfo }}</p>
        <div class="data-list-input" style="width:190px;">
            <p id="prijsID">{{ $festival->prijs }} EUR</p>
            <p>Kies een munteenheid:</p>
            <select id="CurrencyCode" class="data-list-input" style="width:60px;">
              <option value="EUR">EUR</option>
              <option value="USD">USD</option>
              <option value="GBP">GBP</option>
              <option value="CHF">CHF</option>
              <option value="JPY">JPY</option>
              <option value="CNY">CNY</option>
            </select>
            <button type="button" onclick="pythonService({{ $festival->prijs }})">Convert</button>
        </div>
        <p>Begindatum: {{ $festival->begindatum }}</p>
        <p>Einddatum: {{ $festival->einddatum }}</p>
    </div>
@stop