<h1>Editar Frete</h1>
<form method="POST" action="{{ route('fretes.update', $frete->id) }}">
    @csrf
    @method('PUT')
    <input type="text" name="campo" value="{{ old('campo', $frete->campo) }}">
    <button type="submit">Salvar</button>
</form>
