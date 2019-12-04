<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>35</title>
    <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="boot.css">
</head>

<body>
    <main class="game">
        <h2>垃圾分类小游戏，请点击下面的垃圾，移动到对应的垃圾桶后再次点击。移动太快垃圾会掉下来的。</h2>
        <h3>当前积分：<span id="score">0</span></h3>
        <div id="rubbishBox">
            <img id="rubbish" src="" alt="">
        </div>
        <div class="ashcan">
            <img id="rt" src="images/rt.jpg" alt="">
            <img id="ft" src="images/ft.jpg" alt="">
            <img id="ht" src="images/ht.jpg" alt="">
            <img id="ot" src="images/ot.jpg" alt="">
        </div>
        <span id="score"></span>
        <script src="35.js"></script>
    </main>
</body>

</html>