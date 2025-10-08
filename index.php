<?php

namespace Adb;

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
<<<<<<< HEAD
require_once __DIR__.'/public/index.php';
    
    
}
else {
    header('Location: public/index.php');
    
=======
require_once __DIR__.'/public/index.php';        
>>>>>>> 0e25e3bfb504a2e99fbd26c708759fca59e12c97
}

else {
header('Location: public/index.php');
}


?>

