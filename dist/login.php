<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Uber Photo Booth</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/style.css"/>
</head>
    <body>
        <?php
            require_once 'vendor/autoload.php';

            $fb = new Facebook\Facebook([
              'app_id' => '',
              'app_secret' => '',
              'default_graph_version' => 'v2.9',
            ]);

            $helper = $fb->getRedirectLoginHelper();

            $permissions = ['email']; // Optional permissions
            $loginUrl = $helper->getLoginUrl('https://example.com/fb-callback.php', $permissions);

            echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
        ?>
    </body>
</html>