<?php

namespace App\Enums;
use ReflectionClass;

abstract class Enum {
    static function getConstants(){
        $class = new ReflectionClass(get_called_class());
        return array_keys($class->getConstants());
    }
}
