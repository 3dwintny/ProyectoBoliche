<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tipos de Contrato</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Contrato</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipos_contratos as $item)
            <tr>
                <td>{{$item->descripcion}}</td>
            </tr>
            @endforeach       
        </tbody>
    </table>
</body>
</html>