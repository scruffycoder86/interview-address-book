<?php

/**
 * This should boot up our API endpoints at the same
 * time as our Single-Page Application is loaded.
 */
require_once 'public/index.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo env('APP_NAME') ?></title>
        <link href="/public/css/app.css" rel="stylesheet"/>
    </head>
    <body>
        <div id="app"></div>
        <script src="/public/js/app.js"></script>
    </body>
</html>