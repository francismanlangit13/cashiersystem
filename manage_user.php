<?php 
include('db_connect.php');
session_start();
if(isset($_GET['id'])){
$user = $conn->query("SELECT * FROM users where id =".$_GET['id']);
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>
<div class="container-fluid">
	<div id="msg"></div>
	
	<form action="" id="manage-user">	
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required  autocomplete="off">
		</div>
		<label for="password">Password</label>
		<div class="input-group mb-3">
			<input type="password" name="password" id="password" class="form-control" value="" autocomplete="off">
			<div class="input-group-append">
				<div class="input-group-text">
					<a href="javascript:void(0)" class="text-reset text-decoration-none pass_view"><i class="fa fa-eye-slash"></i></a>
				</div>
			</div>
		</div>
		<?php if(isset($meta['id'])): ?>
			<small><i>Leave this blank if you dont want to change the password.</i></small>
		<?php endif; ?>
	</form>
</div>
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
	$('#manage-user').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_user',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}else{
					$('#msg').html('<div class="alert alert-danger">Username already exist</div>')
					end_load()
				}
			}
		})
	})
</script>