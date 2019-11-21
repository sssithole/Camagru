<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Photo js</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    <h1>This camera</h1>
    <video id="video" autoplay></video>
    <canvas id="canvas" width="500" height="400"></canvas>
    <div id="canvasy">
        <img src="flag1.jpg" alt="USA" id="flag1"/>
        <img src="flag2.jpg" alt="GER" id="flag2" />
    </div>
    <button id="Snap" onclick="Snap()">Capture</button> 
    <button class ="primary-button" name="UploadImage" id="upload">Upload A Photo</button>

</body>
<script>
     'use strict';
        const capture_btn = document.getElementById("capture_btn");
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const snap = document.getElementById('Snap');
        //const context = canvas.getContext("2d");
        let flag1 = document.getElementById('flag1');
        const flag2 = document.getElementById('flag2');
        // const applyapple = document.getElementById('applyapple');
        // const errorMsgElement = document.getElementById('spanErrorMsg');
        
        const constraints = {
            audio: false,
            video:{
                width:300, height: 300
            }
        };
        //Access webcam
        async function init(){
            try{
                const stream = await navigator.mediaDevices.getUserMedia(constraints);
                handleSuccess(stream);
            }
            catch(e){
                errorMsgElement.innerHTML = 'navigator.getUserMedia.error:${e.toString()}';
            }
        }
        // Success
        function handleSuccess(stream){
            window.stream = stream;
            video.srcObject = stream;
        }
        function sticker(){
            context.drawImage(flag1, 20, 100, 70, 50);
        }
        function stick(){
            context.drawImage(flag2, 20, 150, 70, 50);
        }
        
        // Load init
        init();
        //Draw Image
        var context = canvas.getContext('2d');
        Snap.addEventListener("click", function(){
            context.drawImage(video, 0, 0, 300, 300);
        });
        flag1.addEventListener('click', sticker);
       
        //  function() {
        // context.drawImage(flage1, 20, 100, 50, 60);
        // });
        function handleSuccess(stream){
            window.stream = stream;
            video.srcObject = stream;
        }
        // Load init
        init();
        //Draw Image
        var context = canvas.getContext('2d');
        Snap.addEventListener("click", function(){
            context.drawImage(video, 0, 0, 300, 300);
        });
        flag2.addEventListener('click', stick)
        // function(){
        //     context.drawImage(falg2, 10, 10, 150, 150);
        // });
        function handleSuccess(stream){
            window.stream = stream;
            video.srcObject = stream;
        }
        
    document.getElementById("upload").addEventListener("click", function() {
    var canvas = document.getElementById("canvas");
    var dataURL = canvas.toDataURL("image/png");
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        console.log(xhr.status, xhr.responseText);
    };
    
    xhr.open('POST', 't.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("img=" + dataURL);
 })

        // function Snap(){
        //      context.drawImage(video,0,0);
        //      video.style.display = "none";
        //      capture_btn.style.display ="none"
//}
</script>
</html>