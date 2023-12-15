<?php
include("db_connect.php");
$students= "SELECT * FROM users WHERE level_auth = '1'";
$students_result = mysqli_query($connector, $students);

if(mysqli_num_rows($students_result)>0){
	?>
    <div class = "div_list">
        <center>
        <a href="./" class="btn btn-primary">Back</a>
        <form method="GET" action="">
            <label for="usersearch">Search:</label>
            <input type="text" id="usersearch" name="usersearch" placeholder="Enter your search">
            <button type="submit">Submit</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $usersearchTerm = isset($_GET['usersearch']) ? $_GET['usersearch'] : '';

            $usersearchTerm = trim($usersearchTerm);
            $usersearchTerm = htmlspecialchars($usersearchTerm);

            $sql = "SELECT * FROM users WHERE (username LIKE '%$usersearchTerm%') AND level_auth = '1'";
            $result = $connector->query($sql);
        ?>
            <table class="list_table">
                <thead>
                    <tr>
                        <th>username</th>
                        <th>Surname</th>
                        <th>Given Name</th>
                        <th>Middle Name</th>
                        <th>Student #</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['l_name']; ?></td>
                                <td><?php echo $row['f_name']; ?></td>
                                <td><?php echo $row['m_name']; ?></td>
                                <td><?php echo $row['student_no']; ?></td>
                                <td>
                                    <?php
                                    include("btn_edit_students.php");
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