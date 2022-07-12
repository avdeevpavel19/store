<head>
    <title>500</title>
</head>
<body class="centered">
    <div class="emoji"><img src="{{asset('images/500.gif')}}" width=250 alt=""></div>

    <p class="title">Упс!</p>
    <p class="text">Похоже, сервер вышел из строя<br></p>
</body>

<style>
    html {
        font-size: 62.5%;
    }
    body {
        background-color: #fff;
        color: #000;
        font-family: helvetica, arial, sans-serif;
        font-size: 1.4em;
        line-height: 1.5;
    }
    .centered {
        position: fixed;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .emoji {
        font-size: 9em;
        text-align: center;
    }
    .title {
        font-size: 3em;
        text-align: center;
        line-height: 0em;
        color: grey;
    }
    .text {
        text-align: center;
    }
</style>
