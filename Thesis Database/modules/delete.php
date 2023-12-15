<?php
$id = 0;
if(isset($_GET['id'])){
	$id = $_GET['id'];
}
include("db_connect.php");
$thesis_del_query = "SELECT * FROM thesis WHERE id= '".mysqli_real_escape_string($connector, $id)."'";
$thesis_del_result = mysqli_query($connector, $thesis_del_query);
if(mysqli_num_rows($thesis_del_result)>0){
	$row = mysqli_fetch_array($thesis_del_result);
?>
    <div class="container">
        <div class="row">
            <div class="col p-3">
                <h5>Are you sure you want to delete this record?</h5>
                <hr />
                <table class="table">
                    <tr>
                    	<td>Title</td>
                        <td><?php echo $row['title']; ?></td>
                    </tr>
                    <tr>
                    	<td>Date</td>
                        <td><?php echo $row['date']; ?></td>
                    </tr>
                    <tr>
                    	<td>Author</td>
                        <td><?php echo $row['author']; ?></td>
                    </tr>
                    <tr>
                    	<td>Location</td>
                        <td><?php echo $row['location']; ?></td>
                    </tr>
                </table>
                <form id="del_thesis">
                	<input type="hidden" name="txtid" value="<?php echo $row['id']; ?>" />
                    <button type="button" class="btn btn-danger" id="thesisdelbtnsave">Delete</button>
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
        
        $("#thesisdelbtnsave").click(function(){
            $.post("modules/thesis_delete_save.php",$("form#del_thesis").serialize(), function(d){
                if(d=='success'){
                    document.location = "./?";
                } else {
                    alert(d);
                }
            });
        });
    });
    </script>
<?php
}
?>