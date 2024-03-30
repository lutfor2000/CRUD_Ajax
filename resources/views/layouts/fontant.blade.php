<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
       <section>
            {{-- <div class="container-fluid"> --}}
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container-fluid">
                          <a class="navbar-brand" href="#">Navbar</a>
                          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                              <a class="nav-link active" aria-current="page" href="#">Home</a>
                              <a class="nav-link" href="{{route('product')}}">Product</a>
                              <a class="nav-link" href="{{route('blog')}}">Blog</a>
                              <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                            </div>
                          </div>
                        </div>
                      </nav>
                </div>
            </div>
       </section>
       <div class="container">
           <div class="row">
                   @yield('body')
           </div>
       </div>

       <script src="{{asset('js/fontawesome.min.js')}}"></script>
       <script src="{{asset('js/bootstrap.min.js')}}"></script>
       <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
      @yield('footer_script')
</body>
</html>