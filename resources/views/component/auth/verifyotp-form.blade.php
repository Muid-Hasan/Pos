<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2 class="mt-5">Verify OTP</h2>
            <form id="veryfyotpForm">
                <div class="mb-3">
                    <label for="otp" class="form-label">Enter the OTP from your Email</label>
                    <input type="text" class="form-control" id="otp" placeholder="">
                </div>
            </form>
                <button type="button" onclick="verifyOtp()" class="btn btn-primary">Next</button>
            
        </div>
    </div>
</div>

<script>
    async function verifyOtp(){
        let otp= document.getElementById('otp').value;
        if(otp.length !==4){
            alert('Wrong OTP!');
        }
       else{
        try{ let URL='/varifyOTP';
              let data={otp:otp, email:sessionStorage.getItem('email')};
             
              let res= await axios.post(URL,data);
              if(res.status===200){
               
                alert("OTP Varified Successfully!");
                sessionStorage.clear();
                window.location.href='/Resetpassword';
                
               } 
             else{
                 alert("Something Worng! Try Again']");
               }
            }
            catch{
                alert("Error Occurs!");
            }
            finally{
               
                document.getElementById('veryfyotpForm').reset();
            }
          }
             
            
    }

</script>