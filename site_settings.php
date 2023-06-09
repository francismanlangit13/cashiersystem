<link rel="stylesheet" href="assets/wysiwyg/css/froala_editor.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/froala_style.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/code_view.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/draggable.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/colors.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/emoticons.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/image_manager.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/image.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/line_breaker.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/table.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/char_counter.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/video.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/fullscreen.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/file.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/quick_insert.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/help.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/third_party/spell_checker.css">
  <link rel="stylesheet" href="assets/wysiwyg/css/plugins/special_characters.css">
<script type="text/javascript" src="assets/wysiwyg/js/froala_editor.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/file.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/fullscreen.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/image.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/quick_insert.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/quote.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/table.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/save.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/url.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/video.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/help.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/print.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/third_party/spell_checker.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/special_characters.min.js"></script>
  <script type="text/javascript" src="assets/wysiwyg/js/plugins/word_paste.min.js"></script>
<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * from system_settings limit 1");
if($qry->num_rows > 0){
	foreach($qry->fetch_array() as $k => $val){
		$meta[$k] = $val;
	}
}
 ?>
<div class="container-fluid">
	
	<div class="card col-lg-12">
		<div class="card-body">
			<form action="" method="POST" id="manage-settings">
				<div class="form-group">
					<label for="name" class="control-label">System Name</label>
					<input type="text" class="form-control" id="name" name="name" value="<?php echo isset($meta['name']) ? $meta['name'] : '' ?>" required>
					<small>Example: Cash Management</small>
				</div>
				<div class="form-group">
					<label for="" class="control-label">System Logo</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input rounded-circle" name="img" onchange="displayImg(this,$(this))">
						<label class="custom-file-label" for="customFile">Choose file</label>
					</div>
				</div>
				<div class="form-group d-flex justify-content-center">
					<img src="<?php echo isset($meta['logo']) ? 'assets/uploads/'.$meta['logo'] :'' ?>" alt="logo" id="cimg" class="img-fluid img-thumbnail">
				</div>
				<div class="form-group">
					<label for="" class="control-label">System Cover</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input rounded-circle" id="customFile" name="img1" onchange="displayImg1(this,$(this))">
						<label class="custom-file-label" for="customFile">Choose file</label>
					</div>
				</div>
				<div class="form-group d-flex justify-content-center">
					<img src="<?php echo isset($meta['cover_img']) ? 'assets/uploads/'.$meta['cover_img'] :'' ?>" alt="background" id="cimg1" class="img-fluid img-thumbnail">
				</div>
				<div class="form-group">
					<label for="sign" class="control-label">Signature Receipt</label>
					<input type="text" class="form-control form-control-sm" name="sign" id="sign" value="<?php echo isset($meta['sign']) ? $meta['sign'] : '' ?>" required>
					<small>Example: Juan Dela Cruz</small>
				</div>
				<div class="form-group">
					<label for="sign_des" class="control-label">Signature Role</label>
					<input type="text" class="form-control form-control-sm" name="sign_des" id="sign_des" value="<?php echo isset($meta['sign_des']) ? $meta['sign_des'] : '' ?>" required>
					<small>Example: Registar</small>
				</div>
				<button class="btn btn-info btn-primary btn-block col-md-2">Update</button>
			</form>
		</div>
	</div>
	<style>
	img#cimg{
		max-height: 10vh;
		max-width: 6vw;
	}
	img#cimg1{
		height: 50vh;
		width: 100%;
		object-fit: contain;
		/* border-radius: 100% 100%; */
	}
</style>

<script>
	function displayImg(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        	$('#cimg').attr('src', e.target.result);
        }
		reader.readAsDataURL(input.files[0]);
    }
}	function displayImg1(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        	$('#cimg1').attr('src', e.target.result);
        }
		reader.readAsDataURL(input.files[0]);
    }
}
	(function () {
      const editorInstance = new FroalaEditor('#page_content',{
      	heightMin:'40vh',
	    imageUploadParam: 'img',
	    imageUploadURL: 'ajax.php?action=save_page_img',
	    imageUploadParams: {},
	    imageUploadMethod: 'POST',
	    imageMaxSize: 5 * 1024 * 1024,
	    imageAllowedTypes: ['jpeg', 'jpg', 'png'],
	    events: {
		      'image.beforeUpload': function (images) {
		        start_load()
		      },
		      'image.uploaded': function (response) {
		        end_load()
		      },
		      'image.replaced': function ($img, response) {
		        // Image was replaced in the editor.
		        console.log($img,response)
		      },
		  }
      })
    })()

	$('#manage-settings').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_settings',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			error:err=>{
				console.log(err)
			},
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.','success')
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})

	})
</script>
</div>
