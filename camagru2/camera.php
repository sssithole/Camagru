<?php
session_start();
var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>
   <head>
       <title>Camera</title>
       <link rel="stylesheet" href="style.css">
   <body>
     <div class="navbar">
         <h1>Camera</h1>
     </div>
     <div class="top-container">
         <video id="video">No streaming available...</video>
         <button id="photo-button" class="btn btn-dark">Take Photo</button>
         <!-- <button type="submit"  >stk</button> -->
         <img class="top-container" src="stikers/download.png" onclick="addSup(this)"><img>
         <button class ="primary-button" name="UploadImage" id="upload">Upload A Photo</button>
         <select id="photo-filter" class="select">
             <option value="none">Normal</option>
             <option value="grayscale(100%">Grayscale</option>
             <option value="sepia(100%)">Sepia</option>
             <option value="invert(100%)">Invert</option>
             <option value="hue-rotate(90deg)">Hue</option>
             <option value="blur(10px)">Blur</option>
             <option value="contrast(200%)">Contrast</option>
             <option value="stikers/panda.jpg">Panda</option>
         </select>
         <button id="clear-button" class="btn btn-light">Clear</button>
         <canvas id="canvas"></canvas>
     </div>
     <div class="bottom-container">
         <div id="photos">
         </div>

     </div>
     

        <form method="post" accept-charset="utf-8" name="form1">
            <input name="hidden_data" id='hidden_data' type="hidden" />
        </form>
   </body>
   <script src="main.js"></script>
   </head>
</html>