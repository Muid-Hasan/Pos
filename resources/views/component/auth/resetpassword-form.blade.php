<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2 class="mt-5">Reset Password</h2>
            <form id="resetpasswordForm">
                <div class="mb-3">
                    <label for="newpassword" class="form-label">New Password</label>
                    <input type="text" class="form-control" id="newpassword" placeholder="">
                    <label for="confirmnewpassword" class="form-label">Confirm Password</label>
                    <input type="text" class="form-control" id="confirmnewpassword" placeholder="">
                </div>
            </form>
                <button type="button" onclick="resetpassword()" class="btn btn-primary">Complete</button>           
        </div>
    </div>
</div>

<script>
    async function resetpassword(){
        let newpassword = document.getElementById('newpassword').value;
        let conpassword= document.getElementById('confirmnewpassword').value;

        if(newpassword.length===0){
            alert("Password is Required!")
        }
        else if(newpassword!==conpassword){
            alert("Password Not matching!")
        }
        else{
            try{
                let res= await axios.post('/resetPassword',{password:newpassword})
                if(res.status===200){
                    alert("Password Have Changed Succesfully!")

                    
                    window.location.href='/'

                }
                else{
                    alert("Something Wrong during reser password!")
                    document.getElementById('resetpasswordForm').reset()
                }

            }
            catch{
                alert("Error Occurs!")
                window.location.href='/'
            }
        }
    }
</script>