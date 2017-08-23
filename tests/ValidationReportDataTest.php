<?php

use Jefrancomix\HoyNoCircula\Data\ReportData;
use Symfony\Component\Validator\Validation;
use HoyNoCircula\Tests\WithValidationTestCase;

class ValidationReportDataTest extends WithValidationTestCase
{
    public function test_Invalidation()
    {
        $report = new ReportData();
        $report->setIndiceImeca('VA');

        $validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator();

        \Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');

        $errors = $validator->validate($report);

        $this->assertIsValidationResultList($errors);
        $this->assertCount(1, $errors);

    }
}
