<a href="./?page=view_thesis&id=<?php echo $row['id']; ?>" class="btn btn-primary">View</a>
<script>
$(document).ready(function(){
	$(".viewthesis").click(function(){
		document.location = "./?page=view_thesis";
	});
});
</script>