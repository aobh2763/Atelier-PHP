<?php

spl_autoload_register(function ($className) {
    $file = "../src/classes/$className.php";

    if (file_exists($file)) {
        require_once $file;
    }
});

?>