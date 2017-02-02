<?php
    if(isset($_SESSION['message']))
    {
        echo '<div class="'.$_SESSION['messageType'].'">'.$_SESSION['message'].'</div>';
    }
?>

<form method="POST">
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" />
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" />
    </div>
    <div>
        <input type="submit" value="Login" />
    </div>
    <p><a href="register">Register a new account</p>
</form>