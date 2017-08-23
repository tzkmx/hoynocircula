<?php
use PHPUnit\Framework\TestCase;

class EnumerationColorTerminacionTest extends TestCase
{
    protected $constants = array();

    public function setUp()
    {
        $this->constants = \Jefrancomix\HoyNoCircula\Enum\ColorTerminacionEnum::getConstants();
    }

    public function test_HasKeys()
    {
        $this->assertArrayHasKey('ROJO', $this->constants);
    }
}
