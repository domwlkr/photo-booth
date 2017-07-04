<?php
    require_once 'vendor/autoload.php';

    if (!session_id()) {
        session_start();
    }

    use Facebook\FacebookRequest;
    use Facebook\GraphObject;
    use Facebook\FacebookRequestException;
    use Facebook\FacebookSDKException;

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

    $fb = new Facebook\Facebook([
        'app_id' => '1867343953590329',
        'app_secret' => '936d210413da782b7fa5f89161ccdfd9',
        'default_graph_version' => 'v2.9',
    ]);

    $data = [
        'message' => 'Photo booth test',
        'source' => $fb->fileToUpload($path . '/' . $latest_filename),
    ];

    $session = $_SESSION['fb_access_token'];

    try {
        // Returns a `Facebook\FacebookResponse` object
        $response = $fb->post('/me/photos', $data, $session);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    $graphNode = $response->getGraphNode();

    echo 'Photo ID: ' . $graphNode['id'];
?>