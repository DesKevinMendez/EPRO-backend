<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FrontEnd EPRO</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 74px;
        }

        .links {
            display: flex;
            text-align: center;
            align-items: center;
            align-content: center;
            flex-direction: column;
        }

        .links h3 {
            font-size: 2rem;
            color: black !important;
        }

        .links>a {
            font-size: 1.5rem;
            color: #636b6f;
            margin-top: 12px;
            padding: 0 25px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Estándares de programación
            </div>

            <div class="links">
                <strong>
                    <h3>Integrantes</h3>
                </strong>
                <table class="table table-striped">

                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Carnet</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Méndez Orellana, Kevin Ezequiel</td>
                            <td style="font-weight: bold">25-3992-2015</td>
                        </tr>
                        <tr>
                            <td>Melendez Barrera Erick Santiago</td>
                            <td style="font-weight: bold">27-1052-2016</td>
                        </tr>
                        <tr>
                            <td>Martinez García Elio Alcidez</td>
                            <td style="font-weight: bold">27-0702-2017</td>
                        </tr>
                        <tr>
                            <td>Serrano Lozano, Jaqueline Marisol</td>
                            <td style="font-weight: bold">27-0377-2017</td>
                        </tr>
                        <tr>
                            <td>Rodriguez Montoyaa, Sonia Elizabeth</td>
                            <td style="font-weight: bold">27-1159-2017</td>
                        </tr>
                        <tr>
                            <td>Villalta Ventura Christian Orlando</td>
                            <td style="font-weight: bold">27-0047-2017</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>
