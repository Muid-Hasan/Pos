<div class="modal" id="delete-modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div id="delete-from" class="modal-body text-center">
                <h3 class="mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once delete, you can't get it back.</p>
                <input class="" id="deleteID"/>
                <input class="" id="deleteFilePath"/>
            </div>

            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="delete-modal-close" class="btn shadow-sm btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="itemDelete()" type="button" id="confirmDelete" class="btn shadow-sm btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function itemDelete(){
      let id= document.getElementById('deleteID').value;
      let deleteFilePath=document.getElementById('deleteFilePath').value;

      document.getElementById('delete-modal-close').click();

      let res=await axios.post('/ProductDelete',{id:id,file_path:deleteFilePath});
      if(res.data===1){
        alert("Delete Successfull!")
        
        await getList();
      }
      else{
        alert("Something Wrong!")
      }

    }
    
</script>