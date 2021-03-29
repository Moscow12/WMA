<?php
$msg = "";
if(isset($_POST['login'])){
    $username = trim($_POST['username']);
    $password  =trim($_POST['password']);
    $msg  = login($username,$password);

}


?>

<section id="form-page" class="section-padding">
    <div class="form-page">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div id="_container">
                    <div style="margin-bottom:2px;color:orange"><h2>LOG IN</h2></div>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="_btn" name="login">login</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    
</section>
