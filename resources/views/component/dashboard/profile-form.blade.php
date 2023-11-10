<div class="container">
    <div class="row ">
        <div class="col-md-12 col-lg-12">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                   <h2 class="mt-5"><u>User Profile:</u> </h2>
                   <form id="registrationForm">
                <div class="mb-3">
                    <label for="firstName" class="form-label"><b>First Name:</b></label>
                    <input type="text" class="form-control" id="firstName" placeholder="Business First Name">
                    <label for="lastName" class="form-label"><b>Last Name:</b></label>
                    <input type="text" class="form-control" id="lastName" placeholder="Business Last Name">
                    <label for="companyName" class="form-label"><b>Company Name:</b></label>
                    <input type="text" class="form-control" id="companyName" placeholder="Example Limited">
                    <label for="address" class="form-label"><b>Business Address:</b></label>
                    <input type="text" class="form-control" id="address" placeholder="Business Address">
                    <label for="mobile" class="form-label"><b>Mobile Number</b></label>
                    <input type="text" class="form-control" id="mobile" placeholder="Mobile Number">
                    <label for="email" class="form-label"><b>Email:</b></label>
                    <input readonly type="text" class="form-control" id="email" placeholder="email address">
                    <label for="password" class="form-label"><b>Password:</b></label>
                    <input type="text" class="form-control" id="password" placeholder="password">
                </div>
            </form>
               <div class="d-flex justify-content-center align-items-center">
                <button type="button" onclick="Update()" class=" btn btn-primary">UPDATE</button>
               </div>
            </div>
         </div>
        
    
        </div>
    </div>
</div>

<script>
    getProfile();
    async function getProfile(){
        let res=await axios.get('/userProfile')
        if(res.status===200 && res.data['status']==='success'){
            let data= res.data['data'];
            document.getElementById('firstName').value=data['firstName'];
            document.getElementById('lastName').value=data['lastName'];
            document.getElementById('companyName').value=data['companyName'];
            document.getElementById('address').value=data['address'];
            document.getElementById('mobile').value=data['mobile'];
            document.getElementById('email').value=data['email'];
            document.getElementById('password').value=data['password'];
        }
        else{
            alert("Request Unsuccessfull!")
        }

    }

    async function Update(){
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
            alert("Last Name is Requried!")
        }
        else if(companyName.length===0){
            alert("Company Name is Requried!")
        }
        else if(address.length===0){
            alert("Address is Requried!")
        }
        else if(mobile.length===0){
            alert("Mobile Number is Requried!")
        }
        else if(email.length===0){
            alert("Email is Requried!")
        }
        else if(password.length===0){
            alert("Password is Requried!")
        }
        else{
            let res= await axios.post('/updateProfile',{
                firstName:firstName, lastName:lastName, companyName:companyName, address:address, mobile:mobile,
                email:email, password:password
            })
            if(res.status===200 && res.data['status']==='success'){
                alert("Profile Updated!")
                await getProfile();
            }
            else{
                alert("Something Wrong During Update!")
            }
        }
        
    }
</script>