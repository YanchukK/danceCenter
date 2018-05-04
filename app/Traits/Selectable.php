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
        //static, when need to use any Models. Thus, instead 'static' -> any model (User:: , Customer:: etc.)
        return static::latest()->pluck($value, $key);
    }

//    public static function getList($_value = 'title', $_key = 'id', $_colection) {
//
//        return $_collection->pluck($_value, $_key);
//    }
}