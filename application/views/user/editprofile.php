<form method = "post" action = "<?php echo base_url('user/editProfile');?>">
    <h1>Bio</h1>

    <textarea name="taBio" rows="4" cols="50"><?php echo $user_instance['usr_bio']; ?>

    </textarea>
	<h1>Profile Visibility</h1>
	<input type="radio" name="radVisibility" value="0" checked> All Users<br>
	<input type="radio" name="radVisibility" value="1"> Lecturers Only<br>
	<input type="submit" name="editProfileSubmit" value="Submit">
	<input type="reset" name="editProfileClear" value="Clear">
</form>