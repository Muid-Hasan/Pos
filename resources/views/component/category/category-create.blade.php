<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
            </div>
            <div class="modal-body">
                <form id="save-form">
                <div class="container">
                    <div class="row">
                        <div class="col-12 p-1">
                         <label class="form-label">Category Name*</label>
                         <input type="text" class="form-control" id="categoryName">
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
        let categoryName=document.getElementById('categoryName').value;
        if(categoryName.length===0){
            alert("Category Name Is Required!")
        }
        else{
            document.getElementById('modal-close').click();

            let res= await axios.post('/categoryCreate',{
                name:categoryName
            })

            if(res.status===201){
                alert("New Category Creates!")
                await getList();
            }
            else{
                alert("Error!")
            }
        }
    })
</script>