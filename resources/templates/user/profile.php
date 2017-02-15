<?php
    if( isset( $_SESSION['userId'] ) ) {
        $firstName = $_SESSION['firstName'];
        $lastName = $_SESSION['lastName'];
        $email = $_SESSION['email'];
        $userId = $_SESSION['userId'];
        $userPwd = $_SESSION['password'];
    } else {
        echo '<div class="alert alert-'.$_SESSION['messageType'].'">'.$_SESSION['message'].'</div>';
    }
?>
    <div class="jumbotron">
        <form class="form-horizontal" method="post">
            <div class="row">
                <div class="form-group">
                    <label for="firstName" class="col-sm-2 control-label">First Name</label>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="text" class="form-control" name="firstName" id="firstName" value="<?= $firstName ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">Last Name</label>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="text" class="form-control" name="lastName" id="lastName"  value="<?= $lastName ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="email" class="form-control" name="email" id="email"  value="<?= $email ?>" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="password" class="form-control" name="password" value="<?= $userPwd ?>" id="password" placeholder="New Password">
                        <input type="hidden" name="userId" id="userId" value="<?= $_SESSION['userId'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="register" class="btn btn-info">Update Profile</button>
                    </div>
                </div>
            </div>
        </form>
    </div>