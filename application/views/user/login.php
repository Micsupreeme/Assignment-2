<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css')?>"/>
    <title><?php echo $title; ?></title>
</head>
<body>
    <div class="logo"><a href="<?php echo base_url('user/profile/' . $this->session->userdata('id'));?>">
            <b class="logo">UniBird</b></a></div>
    <br><p class="intro">Your Academic Meeting and Messaging Network</p>
<form method="post" action="">
    <label><b>Email Address:</b></label>
        <input class="loginFields" type="email" placeholder="Enter your Email" name="userEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br>
    <label><b>Password:</b></label>
        <input class="loginFields" type="password" name="userPassword" placeholder="Enter your Password"><br>
        <button name="login" type="submit" id="login" value="Log In">Login</button>
</form>
<p>New user? Please <a href="<?php echo base_url('user/registerUser'); ?>">register</a></p>
<?php echo validation_errors(); ?>
</body>