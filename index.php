<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Page</title>
    <link rel="stylesheet" href="./Semantic-UI-CSS-master/semantic.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    
    <div class="ui text container custom_table">
        <h2 class="ui header">Login Here</h2>
        <p id='login'>Please enter correct credentials</p>
        <form action="#" class="ui form">
            <div class="field">
                <label>Username</label>
                <div class="ui left icon input">
                  <input type="text" id="username" placeholder="Username">
                  <i class="user icon"></i>
                </div>
              </div>
              <div class="field">
                <label>Password</label>
                <div class="ui left icon input">
                  <input type="password" id="passwordd">
                  <i class="lock icon"></i>
                </div>
              </div>
            <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" id="password" tabindex="0">
                <label>I agree to the Terms and Conditions</label>
            </div>
            </div>
            <br>
            <button class="ui primary button" onclick="loginProcess()" type="button">LOGIN</button>
        </form>
    </div>
    <script src="library/jquery.js"></script>
    <script src="Semantic-UI-CSS-master/semantic.min.js"></script>

    <script>
        function loginProcess(){
            var username = document.getElementById('username').value;
            var password = document.getElementById('passwordd').value;
            $("#login").show();
            if(username == ""){
                $("#username").css("border", "2px solid red");
                exit();
            }else if(password == ""){
                $("#passwordd").css("border", "2px solid red");
                exit()
            }
            alert(username+'=='+password);
            $.ajax({
                type:'POST',
                url:'process/login.php',
                data:{username:username,password:password,  loginProcess:''},
                success:function(responce){
                   if(responce =="100"){
                        window.open("dashboard.php", "_parent");
                   }else if(responce =='200'){
                        $("#login").css("color", "red");
                        $("#login").fadeOut(3000);
                        
                   }
                }
            });
        }
    </script>
</body>
</html>