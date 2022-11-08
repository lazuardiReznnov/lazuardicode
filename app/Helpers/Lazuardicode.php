<?php
namespace App\Helpers;

class Lazuardicode
{
    public static function expire($date1, $date2)
    {
        if ($date1 <= $date2) {
            $css = 'danger';
        } else {
            $css = 'success';
        }
        return $css;
    }
}
