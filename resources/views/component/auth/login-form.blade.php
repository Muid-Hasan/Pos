

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="mt-5">Login</h2>
                <form id="loginForm">
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter your Email">                  
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password">
                    </div>
                </form>
                     <div>
                    <button type="btton" onclick="Login()" class="btn btn-primary">Login</button>
                     </div>
                
                <div class="float-start mt-3">
                    <span>
                        <a class="text-center me-3 h6" href="{{ url('/Registration') }}">Sign Up</a>
                        <span class="me-1">|</span>
                        <a class="text-center me-3 h6" href="{{ url('/Sendotp') }}">Forget Password</a>
                    </span>
                </div>
                
            </div>
        </div>
    </div>

    <script>
        async function Login(){
            let email= document.getElementById('email').value;
            let password= document.getElementById('password').value;
            if(email.length===0)(
                alert("Email is Required!")
            )
            else if(password.length===0){
                alert("Password is Required!")
            }
            else{
                try{
                let res= await axios.post('/userLogin',{email:email,password:password})
                if(res.status===200){
                 alert("Login Successfull!");
                 window.location.href = '/Dashhome';
                 document.getElementById('loginForm').reset();
                }
                else{
                    alert(res.data['message'])
                }
                }
                catch{
                     alert("Something Wrong During Login")
                }
                

            }

        }

    </script>

