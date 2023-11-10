<!doctype html>
<html lang="en" data-bs-theme="light">

 <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>POS</title>
         
         <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet"/>
         <script src="{{asset('js/axios.min.js')}}"></script>
        
        
      
 </head>
     <body class="bg-stone-100 h-screen">
 
            <div class="" id="content-div">
             @yield('content')
            </div>

           <script src="{{asset('js/bootstrap.bundle.js') }}"></script>
        </body>
</html>