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
         <select id="photo-filter" class="select">
             <option value="none">Normal</option>
             <option value="grayscale(100%">Grayscale</option>
             <option value="sepia(100%)">Sepia</option>
             <option value="invert(100%)">Invert</option>
             <option value="hue-rotate(90deg)">Hue</option>
             <option value="blur(10px)">Blur</option>
             <option value="contrast(200%)">Contrast</option>
         </select>
         <button id="clear-button" class="btn btn-light">Clear</button>
         <canvas id="canvas"></canvas>
     </div>
     <div class="bottom-container">
         <div id="photos">
         </div>
     </div>
   </body>
   <script src="main.js"></script>
   </head>
</html>