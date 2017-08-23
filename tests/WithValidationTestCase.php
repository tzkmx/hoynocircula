<?php

namespace HoyNoCircula\Tests;
use PHPUnit\Framework\TestCase;
use HoyNoCircula\Tests\Assertion\IsValidationConstraintListAssertion;

abstract class WithValidationTestCase extends TestCase
{

    public static function assertIsValidationResultList($object, $message = '')
    {
        self::assertThat($object, self::isValidationResultList(), $message);
    }
    public static function isValidationResultList()
    {
        return new IsValidationConstraintListAssertion();
    }
}
