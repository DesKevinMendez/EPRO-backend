<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invitados</title>
    <style>
   .table {
  width: 100%;
  margin-bottom: 1rem;
  color: #212529;
}

.table th,
.table td {
  padding: 0.75rem;
  vertical-align: top;
  border-top: 1px solid #dee2e6;
}

.table thead th {
  vertical-align: bottom;
  border-bottom: 2px solid #dee2e6;
}

.table tbody + tbody {
  border-top: 2px solid #dee2e6;
}

.table-sm th,
.table-sm td {
  padding: 0.3rem;
}

.table-bordered {
  border: 1px solid #dee2e6;
}

.table-bordered th,
.table-bordered td {
  border: 1px solid #dee2e6;
}

.table-bordered thead th,
.table-bordered thead td {
  border-bottom-width: 2px;
}

.table-borderless th,
.table-borderless td,
.table-borderless thead th,
.table-borderless tbody + tbody {
  border: 0;
}

.table-striped tbody tr:nth-of-type(odd) {
  background-color: rgba(0, 0, 0, 0.05);
}

.table-hover tbody tr:hover {
  color: #212529;
  background-color: rgba(0, 0, 0, 0.075);
}

img {
    width: 80px;
    height: 80px;
    float: right;
}
</style>
</head>
<body>
    <div class="headers">
        <img src="https://www.utec.edu.sv/images/brand.png" alt="Logo universiad tecnologica" srcset="">
        <h3>Estándares de programación</h3>
        <br>
        <strong>Reporte de:</strong> Invitados autorizados para usar el parqueo
        <span style="float:right">{{ Carbon\Carbon::now()->format('l jS \\of F Y h:i:s A') }}</span>
        <hr>
    </div>
    <div class="body">
            <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Fecha de autorización</th>
                        </tr>
                    </thead>
                    @foreach ($invitados as $invitados)
                        <tr>
                            <td>{{ $invitados->nombre }}</td>
                            <td>{{ $invitados->apellido }}</td>
                            <td>{{ $invitados->email }}</td>
                            <td>{{ Carbon\Carbon::parse($invitados->fecha_registro)->format('M d Y') }}</td>
                        </tr>
                    @endforeach
                </table>
    </div>
</body>
</html>
