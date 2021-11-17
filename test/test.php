<?php

static $test = 10;

function T_1()
{

    global $test;
    $test = 100;
}

function T_2()
{
    global $test;
    if ($test == 10)
        echo "test == 10";
}
