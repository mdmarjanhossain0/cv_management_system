<?php

function get_domain()
{
    $url = $_SERVER["SERVER_NAME"];
    $domain = parse_url("https:// $url");
    print_r($domain);
    return $domain["host"];
}






echo get_domain();
