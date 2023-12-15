<a href="./?page=edit_thesis&id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
<button type="button" class="btn btn-danger thesis_btndelete" id="rec_<?php echo $row['id']; ?>">Delete</button>

<script>
	$(document).ready(function(){
		$(".thesis_btndelete").click(function(){
			var id = $(this).attr("id").replace("rec_","");
			$.post("modules/delete.php?id=" + id,function(d){
				$("#ConfCont").html(d)
				$("#ConfirmationModal").modal('show');
			});
		});
	});
</script>

<div class="modal fade" id="ConfirmationModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student Information</h5>
      </div>
      <div id="ConfCont">
      </div>
    </div>
  </div>
</div>