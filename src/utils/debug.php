<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

function dump($params)
{
    echo ('
    <div style="
    display:inline-block;
    background:lightgray;
    border:1px solid gray;
    padding:10px;"
    >
    <pre>
    ');
    print_r($params);
    echo ('</pre></div><br>');
}
