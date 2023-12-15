<h1> home </h1>
<center>
<?php
if ($_SESSION['level'] == "2") {
    include("btn_add_thesis.php");
}
?>
</center>
<br>
<?php
include("db_connect.php");
$thesis = "SELECT * FROM thesis";
$thesis_result = mysqli_query($connector, $thesis);

if(mysqli_num_rows($thesis_result)>0){
	?>
    <div class = "div_list">
        <center>
        <form method="GET" action="">
            <label for="search">Search:</label>
            <input type="text" id="search" name="search" placeholder="Enter your search">
            <button type="submit">Submit</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

            $searchTerm = trim($searchTerm);
            $searchTerm = htmlspecialchars($searchTerm);

            $sql = "SELECT * FROM thesis WHERE author LIKE '%$searchTerm%'";
            $result = $connector->query($sql);
        ?>
            <table class="list_table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Author</th>
                        <th>Location</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['author']; ?></td>
                                <td><?php echo $row['location']; ?></td>
                                <td>
                                    <?php
                                    include("btn_view_thesis.php");
                                    if ($_SESSION['level'] == "2") {
                                        include("admin_thesis_buttons.php");
                                    };
                                    ?>
                                </td>
                            </tr>
                        <?php
                    }
                    $connector->close();
        }
    }
    else {
        echo '<center> "No records are found!" </center>';
    }
                        ?>
                </table>
            </center>
        </div>