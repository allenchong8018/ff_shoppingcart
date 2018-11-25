<?php
namespace App\Helpers;
class helpers
{
    function presentPrice($price)
    {
        return'$' . number_format($price /100 , 2);
    }
}