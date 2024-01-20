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
         
        <?php foreach($blogs as $fileobj):  ?>     //and then blog obj are reach here and each fileobj is comeout
         
               <div class="blog-card">
                <?= $fileobj->getContents() ?>    //getter method
            </div>
        </div>
        <?php endforeach; ?>
</body>
</html>
