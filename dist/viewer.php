<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HTML 5'izl Boilerplate Shizzle</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/style.css"/>
</head>
    <body>
        <?php 
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

            echo '<img src="camera-imgaes/' . $latest_filename . '">'
        ?>
    </body>
</html>