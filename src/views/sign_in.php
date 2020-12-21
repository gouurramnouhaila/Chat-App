<!
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Sansita+Swashed&display=swap" rel="stylesheet">
    <title>Log In</title>
    <style>
        body{

            background-color: darkturquoise;
            font-family: 'Roboto Light',sans-serif;
            background-size: cover;
        }
        .form-control{
            min-height: 41px;
            box-shadow: none;
            border-color: bisque;
        }
        .form-control:focus{
            border-radius: 3px;
        }
        .form-header{
            margin: -30px -30px 20px;
            padding: 30px 30px 10px;
            text-align: center;
            background: gainsboro;
            color: white;
        }
        .form-header h2,p{
            margin: 20px 0 15px;
            font-size: 25px;
            line-height: normal;
            font-family: 'Josefin Sans', sans-serif;
        }
        .singIn-form{
            width: 400px;
            margin: 0 auto;
            padding: 30px 0;
        }
        .singIn-form form{
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #f0f0F0;
            box-shadow: 0px 2px 2px rgba(0,0,0,0.3);
            padding: 30px;
        }
        .singIn-form .form-group{
            margin-bottom: 20px;
        }
        .singIn-form label{
            font-weight: normal;
            font-size: 13px;
        }
        .singIn-form .btn{
            font-size: 16px;
            font-weight: bold;
            background: orange;
            border: none;
            min-width: 200px;
        }
        .singIn-form .btn:hover{
            background: darkorange !important;
            outline: none;
        }
        .singIn-form a{
            color: burlywood;
        }
        .singIn-form a:hover{
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="singIn-form">
        <form action="/sign_In" method="post">
            <div class="form-header">
                <h2>Sign In</h2>
                <p>Login to MyChat</p>
                <div>
                    <?php
                    if(isset($_SESSION["errorMessage"])) {
                        ?>
                        <div class="error-message"><?php  echo $_SESSION["errorMessage"]; ?></div>
                        <?php
                        unset($_SESSION["errorMessage"]);
                    }
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="someone@site.com" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="small">Forgot password? <a href="/forgot_Password">Click Here</a> </div><br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_in">Sign In</button>
            </div>
        </form>
        <div class="text-center small" style="color: #674288;">Don't have an account? <a href="/sign_up">Create One</a> </div>
    </div>
</body>