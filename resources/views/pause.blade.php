<?php
    
?>


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/style.css">
        <title>Laravel</title>
        <script src="/app.js"></script> 
</head>
<body>
        
        <div class="container">
        <h1>Blog Project</h1>
         
        <?php foreach($blogs as $blog):  ?>     //and then blog obj are reach here and each fileobj is comeout
         
               <div class="blog-card">
               <h3>
              <a href="/blogs/<?= $blog->slug?> ">
               <?= $blog->title ?>
               </a>
             </h3>  
              
              <p> <?= $blog->intro ?></p>
            </div>
        </div>
        <?php endforeach; ?>
</body>
</html>

//we have already control all HTML in one place and more clear.
//earlier html are in blog folder and pause.blade.php