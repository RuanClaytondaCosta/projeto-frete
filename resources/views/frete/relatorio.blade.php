@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Relatório de Fretes</h1>

    <form action="{{ route('fretes.relatorio') }}" method="GET" class="mb-4">
        <div class="row g-3">
            <div class="col-md-3">
                <label for="tipo" class="form-label">Tipo de Frete</label>
                <select name="tipo" class="form-control">
                    <option value="">Todos</option>
                    <option value="normal" {{ request('tipo') == 'normal' ? 'selected' : '' }}>Normal</option>
                    <option value="expresso" {{ request('tipo') == 'expresso' ? 'selected' : '' }}>Expresso</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="cliente" class="form-label">Nome do Cliente</label>
                <input type="text" name="cliente" class="form-control" value="{{ request('cliente') }}">
            </div>
            <div class="col-md-3">
                <label for="valor_min" class="form-label">Valor Mínimo</label>
                <input type="number" step="0.01" name="valor_min" class="form-control" value="{{ request('valor_min') }}">
            </div>
            <div class="col-md-3">
                <label for="valor_max" class="form-label">Valor Máximo</label>
                <input type="number" step="0.01" name="valor_max" class="form-control" value="{{ request('valor_max') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Filtrar</button>
        <a href="{{ route('fretes.exportar_pdf', request()->all()) }}" class="btn btn-danger mt-3">Exportar PDF</a>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Peso (kg)</th>
                <th>Distância (km)</th>
                <th>Tipo</th>
                <th>Valor (R$)</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($fretes as $frete)
                <tr>
                    <td>{{ $frete->cliente }}</td>
                    <td>{{ $frete->peso }}</td>
                    <td>{{ $frete->distancia }}</td>
                    <td>{{ ucfirst($frete->tipo) }}</td>
                    <td>R$ {{ number_format($frete->valor, 2, ',', '.') }}</td>
                    <td>{{ $frete->created_at->format('d/m/Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Nenhum frete encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
