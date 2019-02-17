<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyles.css')}}">
    <script type="text/javascript" src="{{ asset('js/jquery3.3.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
    <title>CableUNET</title>
</head>

<body>

    <div class="header">
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="{!!route('admin')!!}">CableUNET
                <img src="{{{ asset('faviconunet.ico') }}}" width="30" height="30" class="d-inline-block align-top" alt="">      
                </a>
            </nav>
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            @yield("header")    

        </nav>       

    </div>    

    <main class="container">
        
        @if(session()->has('flash'))
            <div class="alert alert-info">{{ session('flash') }}</div>
        @endif

        @yield("container")
    </main>

        

    <footer class="footer">
        <p>Footer is a element of page. Footer is a element of page.
           Footer is a element of page. Footer is a element of page.
           Footer is a element of page. Footer is a element of page. 
        </p>
        @yield("footer")
    </footer>

</body>

</html>