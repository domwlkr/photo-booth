<?php

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$filename = generateRandomString();

$output = shell_exec('/opt/local/bin/gphoto2 --capture-image-and-download --filename=' . $filename . '.jpg');

$path = "/Users/dom/Documents/sites/dom/camera-project/dist/camera-images"; 

$latest_ctime = 0;
$latest_filename = '';    

$d = dir($path);

while (false !== ($entry = $d->read())) {
    $filepath = "{$path}/{$entry}";
    // could do also other checks than just checking whether the entry is a file
    if (is_file($filepath) && filectime($filepath) > $latest_ctime) {
        $latest_ctime = filectime($filepath);
        $latest_filename = $entry;
    }
}

echo $latest_filename;

?>