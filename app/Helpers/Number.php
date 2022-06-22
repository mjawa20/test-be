<?php

namespace App\Helpers;

use Carbon\Carbon;

class Number
{
    private static $id = 0;
    public static function transaksiGenerate()
    {
        $mytime = explode('-', Carbon::now()->format('Y-m'));
        self::$id = self::$id + 1; 
        return join('', $mytime) . '-' . sprintf('%04d', self::$id);
    }
}
