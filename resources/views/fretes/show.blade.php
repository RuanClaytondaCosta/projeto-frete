@extends('layouts.app')

@section('content')
    <h2>Detalhes do Frete</h2>
    <p>Origem: {{ $frete->origem }}</p>
    <p>Destino: {{ $frete->destino }}</p>
    <p>Valor: R$ {{ number_format($frete->valor, 2, ',', '.') }}</p>

    <a href="{{ route('fretes.index') }}">Voltar à lista</a>
@endsection
