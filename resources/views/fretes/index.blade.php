@extends('layouts.app') <!-- Extende o layout base -->

@section('content')
    <div class="container">
        <h1>Listagem de Fretes</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Origem</th>
                    <th>Destino</th>
                    <th>Valor</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fretes as $frete)
                    <tr>
                        <td>{{ $frete->id }}</td>
                        <td>{{ $frete->origem }}</td>
                        <td>{{ $frete->destino }}</td>
                        <td>R$ {{ number_format($frete->valor, 2, ',', '.') }}</td> <!-- Formatação do valor -->
                        <td>{{ \Carbon\Carbon::parse($frete->data)->format('d/m/Y') }}</td> <!-- Formatação da data -->
                        <td>
                            <a href="{{ route('fretes.show', $frete->id) }}" class="btn btn-info btn-sm">Detalhes</a>
                            <a href="{{ route('fretes.edit', $frete->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('fretes.create') }}" class="btn btn-primary">Cadastrar Novo Frete</a>
    </div>
@endsection
