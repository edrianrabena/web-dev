<?php
$id = 0;
if(isset($_GET['id'])){
	$id = $_GET['id'];
}
echo $id;
include("db_connect.php");
$users_query = "SELECT * FROM users WHERE id= '".mysqli_real_escape_string($connector, $id)."'";
$users_result = mysqli_query($connector, $users_query);
if(mysqli_num_rows($users_result)>0){
	$row = mysqli_fetch_array($users_result);
?>
    <div class="container border rounded my-3">
        <div class="row">
            <div class="col p-3">
                <h4>Edit users</h4>
                <a href="./?page=manage_students" class="btn btn-primary">Back</a>
                <hr />
                <form id="frmusers" enctype="multipart/form-data">
                	<input type="hidden" name="txt_users_id" value="<?php echo $row['id']; ?>" />
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
                    <div class="txt_f_name">
                        <label for="txtlname">Abstract</label>
                        <input type="text" class="form-control" id="txt_f_name" name="txt_f_name" value="<?php echo $row['f_name']; ?>">
                    </div>
                    <div class="txt_m_name">
                        <label for="txtlname">Location</label>
                        <input type="text" class="form-control" id="txt_m_name" name="txt_m_name" value="<?php echo $row['m_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="txt_l_name">Title</label>
                        <input type="text" class="form-control" id="txt_l_name" name="txt_l_name" value="<?php echo $row['l_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="txt_student_no">Date</label>
                        <input type="text" class="form-control" id="txt_student_no" name="txt_student_no" value="<?php echo $row['student_no']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="txt_username">Author</label>
                        <input type="text" class="form-control" id="txt_username" name="txt_username" value="<?php echo $row['username']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="txt_password">Author</label>
                        <input type="text" class="form-control" id="txt_password" name="txt_password" value="<?php echo $row['password']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="upload">Upload Full Document</label>
                        <input type="file" class="form-control" id="upload" name="upload[]">
                    </div>
                    <button type="button" class="btn btn-primary" id="btn_users_save">Save</button>
                </form>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function(){     
        $("#btn_users_save").click(function(){

			
			var form = $('form#frmusers')[0]; 
			var formData = new FormData(form);
			
			$.ajax({
				url: "modules/edit_students_save.php",
				type: 'post',
				data: formData,
				contentType: false,
				processData: false,
				success: function(d){
					if(d=='success'){
						alert("Successfully Saved");
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