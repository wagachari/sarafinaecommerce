<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Page Title</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" />
	<!-- <script src="main.js"></script> -->
</head>

<body>
<div class="container">
	<div class="form-control">
	
	<div class="container-fluid" style="margin-top:80px;margin-left:80px;">

		<?php if (!empty($validation_errors)) {
    echo $validation_errors;
}
?>
		<?php echo form_open($this->uri->uri_string()); ?>
		<div>
			<label for='first_name'>Group Name: </label>
			<input type="text" name="group_name">
		</div>
		<div>
			

			<input type="submit" value="add" class="button1">
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
</div>
</div>
</body>

</html>
