/**
 * I'm Declaring video variable so that i can access->
 * <video id="video" autoplay></video>
 * in my html file (index.html)
 * document.getElemtentById("video") gets the id="video" on html
 */
const video = document.getElementById("video");
const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
const capture_btn = document.getElementById("capture_btn");
const clear_btn = document.getElementById("clear_btn");
const stickers = document.getElementById("stickers");

var imgadded;

/**
 * Initialising attributes
 */
stickers.style.display = "none";
canvas.style.display = "none";
clear_btn.style.display = "none";
/**
 * Streams the video on html Tag
 * <video id="video" height="300px" width="400px" autoplay></video>
 * 
 */
const _navigate = navigator.mediaDevices;

 if (_navigate && _navigate.getUserMedia) {
     _navigate.getUserMedia({video : true}).then(function (stream){
         video.srcObject = stream;
     })
 }

 /**
  * Snap() function captures the image
  * activates some few attributes so that you can edit or modify
  * displays editable image on html Tag
  *     <canvas id="canvas" height="300px" width="400px" ></canvas>
  */

function Snap(){
    ctx.drawImage(video,0,0,400,300);
    imgadded = 0;
    stickers.style.display = "";
    canvas.style.display = "";
    clear_btn.style.display = "";
    video.style.display = "none";
    capture_btn.style.display ="none";
}

/**
 * Add sticker i
 * string will contain the id of the sticker so that it can be add 
 * since there's only 2 stickers i added two options
 */
function addSticker(string){
    var img = document.getElementById(string);
    if (imgadded == 0) {
        ctx.drawImage(img, 20, 0 ,100,70);
        imgadded = 1;
    }
    else
    {
        imgadded = 0;
        ctx.drawImage(img, 20, 100 ,100,70);
    }
}

function Clear(){
    ctx.clearRect(0, 0,canvas.width, canvas.height);
    stickers.style.display = "none";
    canvas.style.display = "none";
    clear_btn.style.display = "none";
    video.style.display = "";
    capture_btn.style.display ="";
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