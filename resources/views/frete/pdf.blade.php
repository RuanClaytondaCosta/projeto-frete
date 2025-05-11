<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Relatório de Fretes</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        h1 { text-align: center; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #444;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        thead {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Relatório de Fretes</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fretes as $frete)
                <tr>
                    <td>{{ $frete->id }}</td>
                    <td>{{ $frete->cliente }}</td>
                    <td>{{ $frete->tipo }}</td>
                    <td>R$ {{ number_format($frete->valor, 2, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($frete->created_at)->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
