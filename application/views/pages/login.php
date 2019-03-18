<form action="login.php" method="post" autocomplete = "off">
    <fieldset>
        <legend>Please Login</legend>
        <label>Email Address:</label>
        <input type="email" placeholder="Enter your Email" name="userEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br>
        <label>Password:</label>
        <input type="password" name="userPassword"><br>
        <input name="login" type="submit" id="login" placeholder="Enter your Password" formaction="login.php" value="Sign In">
    </fieldset>
</form>