<!DOCTYPE html>
<html>
<title>Image Management Application</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<script src="sliderengine/jquery.js"></script>
<script src="sliderengine/amazingslider.js"></script>
<link rel="stylesheet" type="text/css" href="sliderengine/amazingslider-1.css">
<script src="sliderengine/initslider-1.js"></script>

<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="assets/css/main.css" />
<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
<head> <center>Welcome to your personalized image manager</center></head>
<body>
<body class="landing">



<br><br>

<?php

$dirTo = getcwd() . '/uploads';

listFolderFiles($dirTo);

function listFolderFiles($dir){
    $dirTo = getcwd() . '/uploads';
    $ffs = scandir($dir);

    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);

// prevent empty ordered elements
    if (count($ffs) < 1)
        return;

    echo '<div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:900px;margin:0px auto 48px;">';
    echo  '<div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">';
    echo   '<ul class="amazingslider-slides" style="display:none;">';
    echo '<ul>';
    foreach($ffs as $ff){
        $imageLoc = 'uploads' . '/' . $ff;
        echo "<li><img src= '".$imageLoc ."'>";
        if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff);
        echo '</li>';
    }

    echo '</ul>';
    echo '<div class="amazingslider-engine"><a href="http://amazingslider.com" title="Responsive jQuery Image Slideshow">Responsive jQuery Image Slideshow</a></div>';
    echo '</div>';
    echo '</div>';


}

?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <br><br> Select image to upload: <br><br>
    <input type="file" name="fileToUpload" id="fileToUpload"> <br> <br>
    <input type="submit" value="Upload Image" name="submit">
</form>


</body>
</html>