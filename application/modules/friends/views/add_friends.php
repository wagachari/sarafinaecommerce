<!DOCTYPE html>
<html>


<body>
<div class="container">
	<div class="form-control">
	
	<div class="container" style="margin-top:80px;margin-left:80px;">

		<?php if (!empty($validation_errors)) {
    echo $validation_errors;
}
?>
			
		<?php echo form_open_multipart($this->uri->uri_string()); ?>
		<div>
			<label for='first_name'>First Name: </label>
			<input type="text" name="first_name">
		</div>
		<div>
			<label for='age'>Age: </label>
			<input type="number" name="age">
		</div>
		<div class="form-group"> 
		<label for='gender'>Gender: </label>
			Male <input type="radio" name="gender" value="male" > Female <input  type="radio" name="gender" value="female">
		</div>


		<div>
			<label for='hobby'>Hobby: </label>
			<input type="text" name="hobby">
		</div>
		<div>
			<label for='hobby'>Phone Number: </label>
			<input type="text" name="phone">
		</div>
		<div class="form-group">
                 <label>Image</label>
                   <input type="file"  id="userfile" name="userfile">
                  <!-- <input type="submit" class="btn btn-primary" value="upload"> -->
 
             
        </div>
		<div>

			<input type="submit" value="welcome friend" class="button1">
		</div>
		<?php echo form_close(); ?>
	
</div>
</div>
</div>
</body>

</html>
