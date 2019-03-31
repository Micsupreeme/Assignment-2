<form method="post" action="<?php echo base_url('index.php/user/validate_login');?>">
        <label>Email Address:</label>
        <input type="email" placeholder="Enter your Email" name="userEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br>
        <label>Password:</label>
        <input type="password" name="userPassword" placeholder="Enter your Password"><br>
        <input name="login" type="submit" id="login" value="Log In">
</form>
<p>New user? Please <a href="<?php echo base_url('index.php/user/registerUser'); ?>">click here</a> to register</p>
