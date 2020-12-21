<!DOCTYPE html>
<html>
<head>
    <title>Documents</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Sansita+Swashed&display=swap" rel="stylesheet">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            background-color: darkturquoise;
            font-family:  sans-serif;
            transition: all 0.5s ease;
        }

        header{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-family: 'Josefin Sans', sans-serif;
            color: #ffa500;
        }

        .intro-text h1{
            font-size: 50px;
            margin-bottom: 10px;
        }
        .intro-text p{
            font-size: 20px;
            font-family: 'Josefin Sans', sans-serif;
            margin-bottom: 10px;
        }

        section {
            height: 100vh;
            display: flex;
            justify-content: space-around;
            flex-direction: column;
            align-items: center;

        }
        .page2{
            text-align: center;
            font-family: 'Josefin Sans', sans-serif;
            width: 70%;
        }

        .page2 h1,h2{
            margin-bottom: 20px;
            font-family: 'Josefin Sans', sans-serif;
            font-size: 20px;
        }
        section img{
            height: 70%;
            width: 90%;
            object-fit: cover;

        }

        .bg-active{
            background-color: white;
            color: dimgrey;
        }
        .btn{
            width: 250px;
            background: orange;
            border:1px solid #eeb44f;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-family:Arial;
            font-size:15px;
            font-weight:bold;
            padding:6px 24px;
            text-decoration:none;
            text-shadow:0px 1px 0px #cc9f52;
        }
        .btn:hover {
            background: darkorange !important;
            color: white;
        }
        .btn:active {
            position:relative;
            top:1px;
        }

    </style>
</head>
<body>
<header>
    <div class="intro-text">
        <h1>Visual Chat app</h1>
        <p>meet new people </p>
    </div>
</header>
<section>
    <div class="page2">
        <h1>Welcome to visual</h1>
        <h2>Click on the down button for start chatting with real people</h2>
        <p id="p">
            <a class="btn" href="/chat">Start chap now</a>
        </p>
    </div>
</section>
<script type="text/javascript">
    function bgChange() {
        if(this.scrollY > this.innerHeight / 2) {
            document.body.classList.add("bg-active");
        }
        else{
            document.body.classList.remove("bg-active");
        }

    }
    window.addEventListener("scroll",bgChange)
</script>
</body>
</html>