<?php
/**
 * Created by PhpStorm.
 * User: GP
 * Date: 23/08/2017
 * Time: 12:27 PM
 */

namespace Jefrancomix\HoyNoCircula\Enum;


class CalidadAireEnum extends AbstractEnum
{
    const
        BUENA = '0-50',
        REGULAR = '51-100',
        MALA = '101-150',
        MUY_MALA = '151-200',
        EXTREMADAMENTE_MALA = '200-';
    public static function getIndices()
    {
        return array_keys(self::getConstants());
    }
}