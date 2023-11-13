<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Customer</h5>
            </div>
            <div class="modal-body">
                <form id="save-form">
                <div class="container">
                    <div class="row">
                        <div class="col-12 p-1">
                         <label class="form-label">Customer Name*</label>
                         <input type="text" class="form-control" id="customerName">
                         <label class="form-label">Customer Email*</label>
                         <input type="text" class="form-control" id="customerEmail">
                         <label class="form-label">Customer Mobile Number*</label>
                         <input type="text" class="form-control" id="customerMobile">
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button id="save-btn" class="btn btn-sm btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("save-btn").addEventListener('click',async function(){
        let customerName=document.getElementById('customerName').value;
        let customerEmail=document.getElementById('customerEmail').value;
        let customerMobile=document.getElementById('customerMobile').value;
        if(customerName.length===0){
            alert("Customer Name Is Required!")
        }
        else if(customerEmail.length===0){
            alert("Email Is Required!")
        }
        else if(customerMobile.length===0){
            alert("Mobile Number Is Required!")
        }
        else{
            document.getElementById('modal-close').click();
           

            let res= await axios.post('/customerCreate',{
                name:customerName,
                email:customerEmail,
                mobile:customerMobile
            })

            if(res.status===201){
                alert("New Customer Creates!")
                document.getElementById('save-form').reset();
                await getList();
            }
            else{
                alert("Error!")
            }
        }
    })
    document.getElementById("modal-close").addEventListener('click',async function(){
        document.getElementById('modal-close').click();
        document.getElementById('save-form').reset();
    })
</script>