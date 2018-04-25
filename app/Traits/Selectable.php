<?php
/**
 * Created by PhpStorm.
 * User: марк
 * Date: 25.04.2018
 * Time: 18:38
 */

namespace App\Traits;


trait Selectable
{
    public static function getSelectList($value = 'name', $key = 'id'){

        return static::latest()->pluck($value, $key);
    }
}