<?php

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/gogallery.php');


$co = new gogallery();
echo $co->nextPage();


?>