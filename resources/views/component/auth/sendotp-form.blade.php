<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2 class="mt-5">Send OTP</h2>
            <form id="sendotpForm">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter your Email">
                </div>
            </form>

                <button type="button" onclick="sendotp()" class="btn btn-primary">Next</button>
            
        </div>
    </div>
</div>

<script>
 async function sendotp(){
     let email= document.getElementById('email').value;
     if(email.length===0){
        alert("Email Required!!")
     }
     else{
        try{
            let res= await axios.post('/sendOTP',{email:email});
            if(res.status===200){
                sessionStorage.setItem('email',email);
                alert(" A Four Digit OTP Code Have Send To Your Email Address")
                document.getElementById('sendotpForm').reset();
                window.location.href='/Verifyotp'
            }
            else{
                alert("Something Wrong")
            }
        }
        catch{
            alert("Error occurs!!")
            window.location.href='/'
        }
     }
 }

</script>
