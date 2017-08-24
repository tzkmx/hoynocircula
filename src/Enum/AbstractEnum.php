<?php

namespace Jefrancomix\HoyNoCircula\Enum;

abstract class AbstractEnum
{
    public static function getConstants()
    {
        $reflector = new \ReflectionClass(get_called_class());
        return $reflector->getConstants();
    }
}
