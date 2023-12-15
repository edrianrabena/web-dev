<button type = "button" class = "nav_btn" id = "managestudents"> Manage students </button>

<script>
    $(document).ready(function() {
        $("#managestudents").click(function() {
            document.location = "./?page=manage_students"
        });
    });
</script>