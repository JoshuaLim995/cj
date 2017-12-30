<?php include ('../CSS.php') ?>
<?php include ('adminHeader.php') ?>
<?php include('../connDB.php');?>

<script type="text/javascript">
	function navCreate(v){
		if(v == '-1'){
			document.getElementById("nav").innerHTML="";
		}else{
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("nav").innerHTML = this.responseText;
				}
				xmlhttp.open("GET","getNav.php?v="+v, true);
				xmlhttp.send();
			}
		}
	}
</script>

<div class="createUser">
	<form method="POST">
		<span><p class="big">Create member </p></span>
		<span>
		<select id="type" name="type" onchange="navCreate(this.value)">
			<option value="-1">-------</option>
			<option value="0">Admin</option>
			<option value="1">Client</option>
			<option value="2">Chef</option>
			<option value="3">Driver</option>
			<option value="4">Nurse</option>
			<option value="5">Patient</option>
		</select>
		</span>
	</form>
	<form id="nav"></form>
</div>