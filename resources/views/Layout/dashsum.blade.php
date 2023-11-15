<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet"/>

    <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset('js/axios.min.js')}}"></script>
    
</head>
<body class="bg-stone-100 h-screen">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#'">
                    <img src="{{asset('images/PaiKar.png')}}" alt="Your POS Logo" height="80">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/Dashhome')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/Categorypage')}}">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/Customer')}}">Customer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/Product')}}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sales</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dashboardDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dashboard
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dashboardDropdown">
                                <li><a class="dropdown-item" href="{{asset('/Userprofile')}}">Profile</a></li>
                                <li><a class="dropdown-item" href="{{asset('/logoutUser')}}">Logout</a></li>
                            </ul>
                        </li>
                        <!-- Add more navigation items as needed -->
                    </ul>
                </div>
            </div>
        </nav>
     </header>
  

    
    <main>
       
        <section class="content">
            <div class="" id="content-div">
                @yield('content')
               </div>
        </section>
    </main>

    
    <footer>
        <p>&copy; 2023 Your Company</p>
    </footer>


    <script src="{{asset('js/bootstrap.bundle.js') }}"></script>
 
</body>
</html>