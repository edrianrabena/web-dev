<?php
$id = 0;
if(isset($_GET['id'])){
	$id = $_GET['id'];
}
include("db_connect.php");
$attached_del_query = "SELECT * FROM thesis WHERE id= '".mysqli_real_escape_string($connector, $id)."'";
$attached_del_result = mysqli_query($connector, $attached_del_query);
if(mysqli_num_rows($attached_del_result)>0){
	$row = mysqli_fetch_array($attached_del_result);
?>
    <div class="container">
        <div class="row">
            <div class="col p-3">
                <h5>Are you sure you want to delete this record?</h5>
                <hr />
                <form id="del_thesis">
                	<input type="hidden" name="txtid" value="<?php echo $row['id']; ?>" />
                    <button type="button" class="btn btn-danger" id="attacheddelbtnsave">Delete</button>
                    <button type="button" class="btn btn-secondary" id = "cancel_delete_attached">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function(){
        
        $("#attacheddelbtnsave").click(function(){
            $.post("modules/attached_delete_save.php",$("form#del_thesis").serialize(), function(d){
                if(d=='success'){
                    document.location = "./?";
                } else {
                    alert(d);
                }
            });
        });
    });

    $('#cancel_delete_attached').click(function() {
    $('#ConfirmationModal').modal('hide');
    });
    </script>
<?php
}
?>