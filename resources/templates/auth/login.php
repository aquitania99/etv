<?php
    if(isset($_SESSION['message']))
    {
        echo '<div class="alert alert-'.$_SESSION['messageType'].'">'.$_SESSION['message'].'</div>';
    }
?>

<div class="jumbotron">

    <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
        <div class="checkbox">
            <label>
<!--                <input type="checkbox" value="remember-me"> Remember me-->
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p><small>Not a user yet? <a href="register">Register a new account</a></small></p>
    </form>
</div>

