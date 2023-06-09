<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
ob_start();
// if(!isset($_SESSION['system'])){
	$system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach($system as $k => $v){
		$_SESSION['system'][$k] = $v;
	}
// }
ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $_SESSION['system']['name'] ?> | Login</title>
 	

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
	    position: fixed;
	    top:0;
	    left: 0;
		background-image: url('assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>') !important
	    /*background: #007bff;*/
	}
	main#main{
		width:100%;
		height: calc(100%);
		display: flex;
	}

</style>

<body class="bg-dark">
  	<main id="main" >
  		<div class="align-self-center w-100">
			<h4 class="text-center" style="color:#cfcf4e;">USTP <b style="color:#f9a889;"><?php echo $_SESSION['system']['name'] ?></b></h4>
			<div id="login-center" class="row justify-content-center">
				<div class="bg-dark card col-md-3">
					<div class="card-body">
						<form id="login-form" >
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="username" placeholder="Username" required>
								<div class="input-group-append">
									<div class="input-group-text">
									<span class="fas fa fa-user"></span>
									</div>
								</div>
							</div>
							<div class="input-group mb-3">
								<input type="password" class="form-control" name="password" placeholder="Password" required>
								<div class="input-group-append">
									<div class="input-group-text">
										<a href="javascript:void(0)" class="text-reset text-decoration-none pass_view"><i class="fa fa-eye-slash"></i></a>
									</div>
								</div>
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa fa-lock"></span>
									</div>
								</div>
							</div>
							<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
						</form>
					</div>
				</div>
			</div>
  		</div>
  	</main>
</body>
<!-- jQuery -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
	$('.pass_view').click(function(){
        var _el = $(this).closest('.input-group')
        var type = _el.find('input').attr('type')
        if(type == 'password'){
            _el.find('input').attr('type','text').focus()
            $(this).find('i.fa').removeClass('fa-eye-slash').addClass('fa-eye')
        }else{
            _el.find('input').attr('type','password').focus()
            $(this).find('i.fa').addClass('fa-eye-slash').removeClass('fa-eye')

        }
    })
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