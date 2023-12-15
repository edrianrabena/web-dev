<?php
$id = 0;
if(isset($_GET['id'])){
	$id = $_GET['id'];
}
include("db_connect.php");
$thesis_query = "SELECT * FROM thesis WHERE id= '".mysqli_real_escape_string($connector, $id)."'";
$thesis_result = mysqli_query($connector, $thesis_query);
echo $id;
if(mysqli_num_rows($thesis_result)>0){
	$row = mysqli_fetch_array($thesis_result);
?>
    <div class="container border rounded my-3">
        <div class="row">
            <div class="col p-3">
                <h1 class = "thesis title"> <?php echo $row['title']; ?> </h1>
                <hr />
                    <div class="form-group">
                       <p class = "thesis_info"> <?php echo $row['date']; ?> </p>
                    </div>
                    <div class="form-group">
                        <p class = "thesis_info"> <?php echo $row['author']; ?> </p>
                    </div>
                    <div class="txt_abstract">
                        <p class = "abstract"> <?php echo $row['abstract']; ?> </p>
                    </div>
                    <div class="txt_location">
                        <p class = "thesis_info"> <?php echo $row['location']; ?> </p>
                    </div>
                    <div class = "form-group">
                        <?php
                            $uploadFolder = './uploads/';
                            $uploadedFileName = $id.'.pdf';
                            $filePath = $uploadFolder . $uploadedFileName;
                            if (file_exists($filePath)) {
                                if ($_SESSION['level'] == "0") {
                                    echo "Request to view file?";
                                }
                                else{
                                    include ("embed_thesis.php");
                                }
                            }
                            else {
                                echo "Full document is currently unavailable.";
                            }
                        ?>
                    </div>
                    <button type="button" class="btn btn-secondary" id="btn_thesis_cancel">Back</button>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function(){
        $("#btn_thesis_cancel").click(function(){
            document.location = "./";
        });
    });
    </script>
<?php
}
?>