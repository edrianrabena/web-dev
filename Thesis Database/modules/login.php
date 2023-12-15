<center>
<div class = "outerlogin">
    <h1> Login </h1>
    <div class = "innerlogin">
        <form id = "userlogin">
            <table class = "logintable">
                <tr>
                    <td> <p class = "logintext"> Username </p> </td>
                    <td> <input type = "email" class = "forminput" id = "inputUsername" name = "inputUsername" placeholder = "Enter Username"> </td>
                </tr>
                <tr>
                    <td> <p class = "logintext"> Password </p> </td>
                    <td> <input type = "password" class = "forminput" id = "inputPassword" name = "inputPassword" placeholder = "Enter Password"> </td>
                </tr>
                <tr>
                    <td colspan = "2" class = "login"> <button type = "button" class = "btn" id = "btnlogin"> Login </button> </td>
                </tr>
            </table>
        </form>
        <form id = "guestlogin">
            <input type = "hidden" class = "forminput" id = "inputUsername" name = "inputUsername" value = "Guest">
            <input type = "hidden" class = "forminput" id = "inputPassword" name = "inputPassword" value = "webdev_thesis_database_guest">
            <button type = "button" class = "btn" id = "btnlogin_guest"> Continue as guest? </button>
        </form>
    </div>
</div>
</center>
<script>
    $(document).ready(function() {
        $("#btnlogin").click(function() {
            $.post("modules/login_req.php", $("form#userlogin").serialize(), function(loginResult){
                if (loginResult == "success"){
                    document.location = "./";
                }
                else {
                    alert (loginResult);
                }
            });
        });
    });

    $(document).ready(function() {
        $("#btnlogin_guest").click(function() {
            $.post("modules/login_req.php", $("form#guestlogin").serialize(), function(loginResult){
                if (loginResult == "success"){
                    document.location = "./";
                }
                else {
                    alert (loginResult);
                }
            });
        });
    });
</script>