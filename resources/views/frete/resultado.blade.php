<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultado do Frete</title>
</head>
<body>
    <h1>Resultado do Frete</h1>
    <p>Cliente: {{ $frete->cliente }}</p>
    <p>Peso: {{ $frete->peso }} kg</p>
    <p>Distância: {{ $frete->distancia }} km</p>
    <p>Tipo: {{ $frete->tipo }}</p>
    <p>Valor calculado: R$ {{ number_format($frete->valor, 2, ',', '.') }}</p>
</body>
</html>
