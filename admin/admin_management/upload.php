<?php

//upload.php

if(isset($_POST["image"]))
{
    $image = $_POST["image"];
    $imageData = base64_encode(file_get_contents($image));
    $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
    echo "<img src=\"$src\" alt=\"\" />";
}

?>