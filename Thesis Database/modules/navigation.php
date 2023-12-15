<div id = "navigation">
    <table class = "td_navi">
        <tr>
            <td>
                <?php
                    if ($page != "") {
                        include("back.php");
                    }
                ?>
            </td>
            <td>
                <?php
                if ($_SESSION['level'] == "2" && $page != ("manage_students" || "edit_students")) {
                    include("btn_managestudents.php");
                }
                ?>
            </td>
            <td>
                <button onclick = "location.href='./?logout=logout'">Logout</button>
            </td>
        </tr>
    </table>
</div>