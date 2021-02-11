<html>
    <head>
        <title>Q-enta Samuel Serrano- @yield('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script src="{{ asset('js/app.js') }}" defer></script>
        <style>
            div.scrollmenu {
              background-color: #333;
              overflow: auto;
              white-space: nowrap;
            }
            
            div.scrollmenu a {
              display: inline-block;
              color: white;
              text-align: center;
              padding: 14px;
              text-decoration: none;
            }
            
            div.scrollmenu a:hover {
              background-color: #777;
            }
            </style>
    </head>
    <body>
        <div id="app">
            @section('sidebar')
            <div class="scrollmenu">
                <a href="/">Home</a>
                <a href="players">Players</a>           
            </div>
            @show
            <div class="container">
                @yield('content')
            </div>
        </div>
    </body>
</html>