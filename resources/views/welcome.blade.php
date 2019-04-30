
<html>
    <head>
      <title>Instascan &ndash; Demo</title>
      <link rel="icon" type="image/png" href="favicon.png">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
      <div id="app">
        <Scanner></Scanner>
      </div>

      <script type="text/javascript" src="{{ asset('js/extras/adapter.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/extras/instascan.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
  </html>
