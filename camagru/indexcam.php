<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Photo js</title>

    <!--Include CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>This camera</h1>
    <video id="video" height="300px" width="400px" autoplay></video>
    <canvas id="canvas" height="300px" width="400px" ></canvas>
    <div id="stickers" >
       <a onclick='addSticker("sticker_1")'>
           <img id="sticker_1" src="./images/sticker_1.png" width="50" height="50" lt="" srcset=""/>
        </a>
        <a onclick='addSticker("sticker_2")'>
            <img id="sticker_2" src="./images/sticker_2.png" width="50" height="50" alt="" srcset=""/>
        </a>
    </div>
    <button id="capture_btn" onclick="Snap()">Capture</button>
    <button id="clear_btn" onclick="Clear()">clear</button>
    <button class ="primary-button" name="UploadImage" id="upload">Upload A Photo</button>
    <!-- Include js at the Bottom- good practice -->
    <script src="cam.js"></script>
</body>
</html>