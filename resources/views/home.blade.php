
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/ico">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>{{env('APP_NAME')}}</title>
</head>
<body>
    <nav class="navbar bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="{{asset('assets/img/logo-invoice.svg')}}" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Bootstrap
          </a>
        </div>
      </nav>
</body>
</html>