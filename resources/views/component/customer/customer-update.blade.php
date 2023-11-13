<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
            </div>
            <div class="modal-body">
                <form id="save-form">
                <div class="container">
                    <div class="row">
                        <div class="col-12 p-1">
                         <label class="form-label">Customer Name*</label>
                         <input type="text" class="form-control" id="customerNameUpdate">
                         <label class="form-label">Customer Email*</label>
                         <input type="text" class="form-control" id="customerEmailUpdate">
                         <label class="form-label">Customer Mobile Number*</label>
                         <input type="text" class="form-control" id="customerMobileUpdate">
                         <input id="updateID">
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Update()" id="update-btn" class="btn btn-sm btn-success">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function FillUpUpdateForm(id){
      document.getElementById('updateID').value=id

      let res=await axios.post('/customerById',{id:id})

      document.getElementById('customerNameUpdate').value=res.data['name']
      document.getElementById('customerEmailUpdate').value=res.data['email']
      document.getElementById('customerMobileUpdate').value=res.data['mobile']
    }
    async function Update(){
        let customerName= document.getElementById('customerNameUpdate').value;
        let customerEmail= document.getElementById('customerEmailUpdate').value;
        let customerMobile= document.getElementById('customerMobileUpdate').value;
        let updateID= document.getElementById('updateID').value;
        document.getElementById('update-modal-close').click();
        let res= await axios.post('/customerUpdate',{name:customerName, email:customerEmail, mobile:customerMobile,id:updateID});
        if(res.status===200 && res.data===1){
            alert("Update Successfull!")
            await getList();
        }
        else{
            alert("Something Wrong!")
        }
    }
</script>