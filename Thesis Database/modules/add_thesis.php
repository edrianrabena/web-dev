<div class="container border rounded my-3">
	<div class="row">
    	<div class="col p-3">
        	<h4>Add Student</h4>
            <hr />
            <form id="frmaddthesis" enctype="multipart/form-data">
            	<div class="form-group">
                    <label for="txt_title">Title</label>
                    <input type="text" class="form-control" id="txt_title" name="txt_title">
                </div>
                <div class="form-group">
                    <label for="txt_date">Date</label>
                    <input type="date" class="form-control" id="txt_date" name="txt_date">
                </div>
                <div class="form-group">
                    <label for="txtmname">Author</label>
                    <input type="text" class="form-control" id="txt_author" name="txt_author">
                </div>
                <div class="form-group">
                    <label for="txtlname">Abstract</label>
                    <input type="text" class="form-control" id="txt_abstract" name="txt_abstract">
                </div>
				<div class="form-group">
                    <label for="txt_location">Location</label>
                    <input type="text" class="form-control" id="txt_location" name="txt_location">
                </div>
                <div class="form-group">
                    <label for="upload">Upload Full Document</label>
                    <input type="file" class="form-control" id="upload" name="upload[]">
                </div>
                
                <button type="button" class="btn btn-primary" id="btnsave">Save</button>
                <button type="button" class="btn btn-secondary" id="btncancel">Cancel</button>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
	$("#btncancel").click(function(){
		document.location = "./";
	});
	
	$("#btnsave").click(function(){
		/*$.post("modules/add_save.php",$("form#frmstud").serialize(), function(d){
			if(d=='success'){
				alert("Successfully Saved");
				document.location = "./";
			} else {
				alert(d);
			}
		});*/
		
		var form = $('form#frmaddthesis')[0]; 
		var formData = new FormData(form);
		
		$.ajax({
			url: "modules/add_thesis_save.php",
			type: 'post',
			data: formData,
			contentType: false,
			processData: false,
			success: function(d){
				if(d=='success'){
					alert("Successfully Saved");
					document.location = "./";
				} else {
					alert(d);
				}
			},
		});
	});
});
</script>
