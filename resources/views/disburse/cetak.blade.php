@extends('layouts.master')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>A4 Paper</title>
    </head>

    <body style="--bleeding: 0.5cm;--margin: 1cm;">
        <div class="page" class="mb-3">
            <img src="{{ asset('') }}assets/images/kopsurat/samarason.jpg" alt="" height="90">
            </br>
            <center>
                <h2>Surat Persetujuan Kredit</h2>
            </center>
            <hr color="black" width="100%">
            <!-- Your content here -->
            <h1>Hello from h1 tag</h1>
            <h2>And I am h2</h2>
            <!-- End of your content -->
        </div>
        <br>
        <div class="page">

            <!-- Your content here -->
            <h1>Hello from h1 tag</h1>
            <h2>And I am h2</h2>
            <!-- End of your content -->
        </div>
    </body>

    </html>
@endsection
