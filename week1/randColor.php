<?php

//This function will produce a random hexidecimal color code.
function rand_color() {
    do{
    $color = strtoupper(
            dechex(
                    rand(0, 10000000)
            )
    );
    }while (strlen($color) < 6);
    return $color;
}