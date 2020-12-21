<?php
/**
 * @var $model \App\src\models\User
 */
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Sansita+Swashed&display=swap" rel="stylesheet">
    <title>Document</title>

    <style>
        body{
            background-color: darkturquoise;
            font-family: 'Roboto Light',sans-serif;
            background-size: cover;
        }
        .form-header{
            margin: -30px -30px 20px;
            padding: 20px 20px 5px;
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
            width: 600px;
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
            margin-top: 10px;
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
            margin-left: 20px;
            margin-top: 40px;
            min-width: 500px;
            min-height: 50px;
            color: #f0f0F0;
        }
        .singIn-form .btn:hover{
            background: darkorange !important;
            outline: none;
            color: #f0f0F0;
        }



    </style>

</head>
<body>
    <div class="singIn-form">
        <form action="" method="post" id="form">
            <div class="form-header">
                <h2>Sign Up</h2>
                <p>Welcome to MyChat App</p>
            </div>
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" id="firstName" class="form-control" placeholder="Enter your first name" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Enter your last name" required>
            </div>
            <div class="form-group">
                <label for="number">Number</label>
                (+212)<input type="text" name="number" id="number" class="form-control" placeholder="Enter your number" required  pattern="[0][0-9]{9}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm password" required>
                <span id="error_password" style="color: red;font-size: 13px;">
                    <?php echo $error ?>
                </span>
            </div>
            <button type="submit" class="btn" id="btn">Save</button>
        </form>
    </div>

</body>
</html>