<form action="Login.php" method="post" autocomplete = "off">
        <label>Email Address:</label>
        <input type="email" placeholder="Enter your Email" name="userEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br>
        <label>Password:</label>
        <input type="password" name="userPassword" placeholder="Enter your Password"><br>
        <input name="login" type="submit" id="login" formaction="" value="Log In">
        <input name="register" type="submit" id="register" value="Register"
</form>