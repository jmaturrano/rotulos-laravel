<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Paper Size - A4</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/pdf.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            .columns{
                font-size: 2.5em !important;
                padding: 10px !important;
            }
            .columns.no-border{
                font-size: 18pt !important;
                padding: 0 10px 5px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1>Rot A4 (SKU)</h1>
            </div>
            <div class="row">
                <div class="col-md-8">
                    @include('includes/paper-format')
                </div>
                <div class="col-md-4">
                    <h3 style="font-weight: 600;">Formulario</h3>
                    <br>
                    <form action="{{ route('mainpost') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="sku">SKU:</label>
                            <input type="text" class="form-control" id="sku" name="sku" value="{{ $sku }}" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Cantidad:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $quantity }}" required>
                        </div>
                        <div class="form-group">
                            <label for="usercode">Código de usuario:</label>
                            <input type="text" class="form-control" id="usercode" name="usercode" value="{{ $usercode }}" required>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>&nbsp;
                        @if($product && $user)
                            @php $download = 'pdf?sku='.$sku.'&quantity='.$quantity.'&usercode='.$usercode; @endphp
                            <a href="{{ url($download) }}" class="btn btn-warning" target="_blank">Download</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
