<?php
    require_once 'vendor/autoload.php';

    if (!session_id()) {
        session_start();
    }

    $fb = new Facebook\Facebook([
        'app_id' => APP_ID,
        'app_secret' => APP_SECRET,
        'default_graph_version' => 'v2.9'
    ]);

    $helper = $fb->getRedirectLoginHelper();

    $permissions = ['publish_actions', 'manage_pages', 'publish_pages']; // Optional permissions
    $loginUrl = $helper->getLoginUrl(CALLBAKC_URL, $permissions);
?>

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
        <?php echo '<a class="button button--facebook" href="' . $loginUrl . '">Log in with Facebook</a>'; ?>
    </body>
</html>