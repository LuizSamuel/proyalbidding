<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('./db_connect.php');
ob_start();
if(!isset($_SESSION['system'])){
	$system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach($system as $k => $v){
		$_SESSION['system'][$k] = $v;
	}
}
ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $_SESSION['system']['name'] ?></title>


<?php include('./header.php'); ?>
<?php
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    background-image: url(assets/uploads/soth.png);
	}
	/* main#main{
		width:100%;
		height: calc(100%);
		background:white;
	} */
	#login-right{
		position: absolute;
		right: center;
		width:40%;
		height: calc(90%);
		background:burlywood;
		opacity: 85%;
		padding-top: 10%;
		margin: 25px 30% 135px;
		align-items: center;
	}
	/* #login-left{
		position: absolute;
		left:0;
		width:60%;
		height: calc(100%);
		background:#59b6ec61;
		display: flex;
		align-items: center;
		background: url(assets/uploads/?php echo $_SESSION['system']['cover_img'] ?>);
	    background-repeat: no-repeat;
	    background-size: cover;
	} */
	#login-right .card{
		margin: auto;
			z-index: 1; /*to bring card infrot of login-right*/
			color: black;
			background: whitesmoke;
			font-weight: 1000;
			font: bold;
			align-items: unset;
	}
	/* .logo {
    margin: auto;
    font-size: 8rem;
    background: white;
    padding: .5em 0.7em;
    border-radius: 50% 50%;
    color: #000000b3;
    z-index: 10;
} */
div#login-right::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: calc(100%);
    height: calc(100%);
		border-radius: 30px;
    background: #000000e0;
}
p,.recoverpass{
	color: black;
	font-weight: 500;
	font: bold;
	font-size: 15px;
}
.recoverpass:hover {
  color: red;
}
button, .adminlo{
	background: black;
	color: white;
	font: bold;
	text-decoration: none;
}
.adminlo:hover{
	cursor: progress;
	color: burlywood;
}

</style>

<body>


  <main id="main" class=" bg-dark">
  		<div id="login-left">
  		</div>

  		<div id="login-right">
  			<div class="card col-md-8">
  				<div class="card-body">

  					<form id="login-form" >
  						<div class="form-group">
  							<label for="username" class="control-label">Username:</label>
  							<input type="text" id="username" name="username" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password:</label>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>
							<p>
  							Forgotten Password? <a class="recoverpass" href="password_recovery.html">recover</a>
  						</p>
  						<center><button class="adminlo">Login</button></center>
  					</form>
  				</div>
  			</div>
  		</div>


  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>
</html>
