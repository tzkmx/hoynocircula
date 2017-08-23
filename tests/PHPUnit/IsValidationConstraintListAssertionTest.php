<?php

namespace HoyNoCircula\Tests\PHPUnit;
use PHPUnit\Framework\TestCase;
use HoyNoCircula\Tests\Assertion\IsValidationConstraintListAssertion;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;

class IsValidationConstraintListAssertionTest extends TestCase
{
    protected $constraint;

    public function setUp()
    {
        $this->constraint = new IsValidationConstraintListAssertion();
    }

    public function testDoesNotMatchPrimitives()
    {
        $this->assertFalse($this->constraint->matches(false));
        $this->assertFalse($this->constraint->matches(0));
        $this->assertFalse($this->constraint->matches('string'));
        $this->assertFalse($this->constraint->matches(array()));
    }
    public function testDoesNotMatchArbitraryObject()
    {
        $this->assertFalse($this->constraint->matches(new \StdClass));
    }
    public function testMatchesValidationConstraintList()
    {
        $validator = Validation::createValidator();
        $assert = new Assert\NotNull();
        $errors = $validator->validate(null, $assert);
        $this->assertTrue($this->constraint->matches($errors));
    }

}