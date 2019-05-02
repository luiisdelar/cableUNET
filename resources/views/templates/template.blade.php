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
        
        <nav class="navbar navbar-expand-lg">
            
            
            <nav class="logounet navbar">    
                <!--a class="navbar-brand" href="{!!route('admin')!!}">CableUNET-->
                    @yield("logo")
                    <img src="{{{ asset('faviconunet.ico') }}}" width="30" height="30" class="d-inline-block align-top" alt="unet">      
                </a>
            </nav>

            <button class="navboton navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            @yield("header")    

        </nav>       

    </div>    

    <main class="container v">
        
        @if(session()->has('flash'))
            <div class="alert alert-info">{{ session('flash') }}</div>
        @endif

        @yield("container")
    </main>

        

    <footer class="footer">
        <p class="text-center">
            Luis Eduardo Ortega De La Rosa, 2019.  
        </p>
        @yield("footer")
    </footer>

</body>

</html>