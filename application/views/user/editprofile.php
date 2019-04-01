<form method = "post" action = "<?php echo base_url('index.php/user/editProfile');?>">
    <h1>Bio</h1>

    <textarea name="taBio" rows="4" cols="50"><?php echo $user_instance['usr_bio']; ?>

    </textarea>
    <h1>Profile Visibility</h1>
    <?php if($user_instance['usr_profile_is_private']==0){
        echo '<input type="radio" name="radVisibility" value="0" checked> All Users<br>';
        echo '<input type="radio" name="radVisibility" value="1"> Lecturers Only<br>';
    }
    else{
        echo '<input type="radio" name="radVisibility" value="0"> All Users<br>';
        echo '<input type="radio" name="radVisibility" value="1" checked> Lecturers Only<br>';
    }?>

    <input type="submit" name="editProfileSubmit" value="Submit">
    <input type="reset" name="editProfileClear" value="Clear">
</form>