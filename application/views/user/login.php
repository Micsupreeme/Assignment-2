<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css')?>"/>
</head>
<body>
<form method="post" action="<?php echo base_url('index.php/user/validate_login');?>">
    <b><p class="logo"> UniBird</p></b>
    <br><p class="intro">Your Academic Meeting and Messaging Network</p>
    <label><b>Email Address:</b></label>
        <input type="email" placeholder="Enter your Email" name="userEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br>
    <label><b>Password:</b></label>
        <input type="password" name="userPassword" placeholder="Enter your Password"><br>
        <button name="login" type="submit" id="login" value="Log In">Login</button>
</form>
<p>New user? Please <a href="<?php echo base_url('index.php/user/registerUser'); ?>">register</a></p>
</body>