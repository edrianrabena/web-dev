<?php
$id = 0;
if(isset($_GET['id'])){
	$id = $_GET['id'];
}
echo $id;
include("db_connect.php");
$thesis_query = "SELECT * FROM thesis WHERE id= '".mysqli_real_escape_string($connector, $id)."'";
$thesis_result = mysqli_query($connector, $thesis_query);
if(mysqli_num_rows($thesis_result)>0){
	$row = mysqli_fetch_array($thesis_result);
?>
    <div class="container border rounded my-3">
        <div class="row">
            <div class="col p-3">
                <h4>Edit Thesis</h4>
                <hr />
                <form id="frmthesis" enctype="multipart/form-data">
                	<input type="hidden" name="txt_thesis_id" value="<?php echo $row['id']; ?>" />
                    <?php
                        $uploadFolder = './uploads/';
                        $uploadedFileName = $id.'.pdf';
                        $filePath = $uploadFolder . $uploadedFileName;
                        if (file_exists($filePath)) {
                            include ("embed_thesis.php");
                            include ("btn_delete_attached.php");
                        }
                        else {
                            echo "There is no file linked to the document.";
                        }
                    ?>
                    <div class="form-group">
                        <label for="txt_title">Title</label>
                        <input type="text" class="form-control" id="txt_title" name="txt_title" value="<?php echo $row['title']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="txt_date">Date</label>
                        <input type="date" class="form-control" id="txt_date" name="txt_date" value="<?php echo $row['date']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="txt_author">Author</label>
                        <input type="text" class="form-control" id="txt_author" name="txt_author" value="<?php echo $row['author']; ?>">
                    </div>
                    <div class="txt_abstract">
                        <label for="txtlname">Abstract</label>
                        <input type="text" class="form-control" id="txt_abstract" name="txt_abstract" value="<?php echo $row['abstract']; ?>">
                    </div>
                    <div class="txt_location">
                        <label for="txtlname">Location</label>
                        <input type="text" class="form-control" id="txt_location" name="txt_location" value="<?php echo $row['location']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="upload">Upload Full Document</label>
                        <input type="file" class="form-control" id="upload" name="upload[]">
                    </div>
                    <button type="button" class="btn btn-primary" id="btn_thesis_save">Save</button>
                    <button type="button" class="btn btn-secondary" id="btn_thesis_cancel">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function(){
        $("#btn_thesis_cancel").click(function(){
            document.location = "./";
        });
        
        $("#btn_thesis_save").click(function(){

			
			var form = $('form#frmthesis')[0]; 
			var formData = new FormData(form);
			
			$.ajax({
				url: "modules/edit_thesis_save.php",
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
<?php
}
?>