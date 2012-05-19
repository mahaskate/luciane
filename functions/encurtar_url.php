<?php

function encurtar_url($url){
    $url = trim($url);
    $url = urlencode($url);
    $shorted_url = file_get_contents('http://migre.me/api.txt?url='.$url );
    return $shorted_url;
}

?>