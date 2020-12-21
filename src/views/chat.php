<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/cerulean/bootstrap.min.css" integrity="sha384-3fdgwJw17Bi87e1QQ4fsLn4rUFqWw//KU0g8TvV6quvahISRewev6/EocKNuJmEw" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Sansita+Swashed&display=swap" rel="stylesheet">
    <style type="text/css">
        body{
            display: flex;
            justify-content: center;
            background-color: darkturquoise;

        }
        .chat{
            width: 500px;
            height: 700px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            background: gainsboro;
            padding-bottom: 30px;
        }
        .messages{
            width: 450px;

            margin-left: 25px;
            height:300pt;
            overflow:auto;

        }
        .input-form{
            display: flex;
            width: 450px;
            height: 100px;
            margin-left: 25px;
        }
        header{
            text-align: center;
            margin: 20px 0 15px;
            font-size: 25px;
            line-height: normal;
            font-family: 'Josefin Sans', sans-serif;
        }
        header h1{
            padding: 15px;
            font-family: 'Josefin Sans', sans-serif;
            color: white;
        }
        textarea{
            height: 50px;
            width: 450px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            border: 1px solid white;
            margin-bottom: 5px;

        }
        .btn{
            width: 450px;
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

        .author{
            width: 20px;
        }
        .btn:hover {
            background: darkorange !important;
            color: white;
        }
        .btn:active {
            position:relative;
            top:1px;
        }
        #author{
            background: white;
            width: 450px;
            color: black;
            border: 1px solid white;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<?php
session_start();
?>

<div class="chat">
    <header>
        <h1>What a chat guys</h1>
    </header>

    <div class="messages">

    </div>
    <div class="input-form">
        <form action="/chat" method="post">
            <input type="hidden" name="author" id="author" value="<?php
            echo $_SESSION["id_user"];
            ?>">
            <textarea name="content" id="content"></textarea>
            <button class="btn">send</button>
        </form>
    </div>
</div>
<script type="text/javascript">

    function getMessages() {
        // create obj xmlHttpRequest to interact with server
        const requestAjax = new XMLHttpRequest();
        requestAjax.open("GET","/getChat",true);

        requestAjax.onload = function () {

            // get data
            const result = JSON.parse(requestAjax.responseText);

            // return display data like and use join to past content of result to a single string
            const html = result.map(function (message) {
                return `
                        <div class="alert alert-dismissible alert-secondary">
                            <span class="author" style="font-weight: bold">${message.firstName}  :  </span>
                            <span class="content">${message.content}</span>
                        </div>
                        <span class="date" style="font-size: 10px;color: gray;">${message.created_at.substring(11,16)} </span>
                        `;
            }).join('');

            // display data on messages div
            const messages = document.querySelector(".messages");
            messages.innerHTML = html;
            messages.scrollTop = messages.scrollHeight;

        }
        // send request
        requestAjax.send();
    }


    function postMessage (event) {
        // Stop submit form
        event.preventDefault();

        // get data from form
        const author = document.querySelector("#author");
        const content = document.querySelector("#content");

        // data condition
        const data = new FormData();
        data.append("author",author.value);
        data.append("content",content.value);

        // config request ajax for post
        const requestAjax =  new XMLHttpRequest();
        requestAjax.open("POST","/chat");

        requestAjax.onload = function () {
            content.value = "";
            content.focus();
            getMessages();
        }

        requestAjax.send(data);
    }

    document.querySelector("form").addEventListener("submit",postMessage);
    const interval = window.setInterval(getMessages,1000);


</script>
</body>
</html>