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
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <a class="navbar-brand" href="#">
                            <img src="{{ asset('images/PaiKar.png') }}" alt="Your POS Logo" height="100">
                        </a>
                    </div>
                    <div class="col">
                        <div class="bg-light p-3">
                            <h6 id="Bname" class="text-start"></h6>
                            <h6 id="Cname"class="text-start"></h6>
                            <h6 id="address" class="text-start"></h6>
                        </div>
                    </div>
                </div>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
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
                                <a class="nav-link" href="{{ url('/InvoicePage') }}">Invoice</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="reportDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Reports
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="reportDropdown">
                                    <li><a class="dropdown-item" href="{{asset('/salereport')}}">Sales Report</a></li>
                                    <li><a class="dropdown-item" href="#">Purchase Report</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="userDropdown">
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
        
        
        <nav class="mt-5 pt-5"></nav>
        <nav class="mt-5 pt-5"></nav>
        <section class="content">
            <div class="" id="content-div">
                @yield('content')
               </div>
        </section>
    </main>

        <nav class="mt-5 pt-5"></nav>
        <nav class="mt-5 pt-5"></nav>
    <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <p><strong> &copy; 2023 </strong><a id="FBname"></a> </p>
                </div>
                <div class="col-lg-6">
                    <ul class="list-unstyled d-flex justify-content-end">
                       
                        
                        <li id="Femail" class="mx-3"><strong>Email:</strong> user@example.com</li>
                        <li id="Fmobile" class="mx-3"><strong>Mobile:</strong> +1234567890</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    

    
    <script src="{{asset('js/bootstrap.bundle.js') }}"></script>
    <script>
        getUser();
    
        async function getUser() {
            try {
                let res = await axios.get('/userProfile');
                let data = res.data.data;
                let BusinessName=`${data.firstName} ${data.lastName}`; 
                document.getElementById('userDropdown').innerHTML = BusinessName; 
                document.getElementById('Bname').innerHTML=BusinessName;
                document.getElementById('Cname').innerHTML=data.companyName;
                document.getElementById('address').innerHTML=data.address;
                document.getElementById('FBname').innerHTML=BusinessName;
                document.getElementById('Femail').innerHTML=data.email
                document.getElementById('Fmobile').innerHTML=data.mobile;// Set the inner HTML of the dropdown
            } catch (error) {
                console.error('Error fetching user profile:', error);
            }
        }
    </script>
 
</body>
</html>