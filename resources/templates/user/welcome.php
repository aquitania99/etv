<?php
if(isset($_SESSION['userId'] ))
{
    $user = $_SESSION['firstName'];
    $userId = $_SESSION['userId'];
}
if(isset($_SESSION['message']))
{
    echo '<div class="alert alert-'.$_SESSION['messageType'].'">'.$_SESSION['message'].'</div>';
}
?>
<div class="jumbotron">
    <div class="row">
        <h2>Howdy <?=$user?>!</h2>
        <nav>
            <ul>
                <li><a href="profile">Profile</li>
                <li><a href="logout">Logout</li>
            </ul>
        </nav>
    </div>
</div>