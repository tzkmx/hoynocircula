<?php

namespace HoyNoCircula\Tests\Assertion;
use PHPUnit\Framework\Constraint\Constraint;
use Symfony\Component\Validator\ConstraintViolationList;


class IsValidationConstraintListAssertion extends Constraint
{
    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other Value or object to evaluate.
     *
     * @return bool
     */
    public function matches($other)
    {
        return $other instanceof ConstraintViolationList;
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'is instance of ' . ConstraintViolationList::class;
    }

}