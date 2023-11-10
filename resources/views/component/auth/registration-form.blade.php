<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2 class="mt-5">Registration Form: </h2>
            <form id="registrationForm">
                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" placeholder="Business First Name">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Business Last Name">
                    <label for="companyName" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="companyName" placeholder="Example Limited">
                    <label for="address" class="form-label">Business Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Business Address">
                    <label for="mobile" class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" id="mobile" placeholder="Mobile Number">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="email address">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" placeholder="password">
                </div>
            </form>
                <button type="button" onclick="Registration()" class="btn btn-primary">Complete</button>
    
        </div>
    </div>
</div>

<script>
    async function Registration() {

        let firstName=document.getElementById('firstName').value;
        let lastName=document.getElementById('lastName').value;
        let companyName=document.getElementById('companyName').value;
        let address=document.getElementById('address').value;
        let mobile=document.getElementById('mobile').value;
        let email=document.getElementById('email').value;
        let password=document.getElementById('password').value;

        if(firstName.length===0){
            alert("First Name is Required!")
        }
        else if(lastName.length===0){
            alert("Last Name is Required!")
        }
        else if(companyName.length===0){
            alert("Company Name is Required!")
        }
        else if(address.length===0){
            alert("Address is Required!")
        }
        else if(mobile.length===0){
            alert("Mobile Number is Required!")
        }
        else if(email.length===0){
            alert("Email address is Required!")
        }
        else if(password.length===0){
            alert("Password is Required!")
        }

        else{
            try{
                let res=await axios.post('/userRegistration',{
                    firstName:firstName, lastName:lastName, companyName:companyName, address:address, email:email
                    ,mobile:mobile , password:password
                })
                if(res.status===200){
                    alert("Registration Successfull!")
                    window.location.href='/Login'
                    document.getElementById('registrationForm').reset()
                }
                else{
                    alert (res.data['message'])
                }
            }
            catch{
                alert("Something Wrong During Registration")
            }
        }

        
    }
</script>