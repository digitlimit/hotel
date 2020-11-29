<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Helpers\TestHelper;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, TestCaseRequestTrait, APIAuthTrait;

    protected $bookingDates;

    protected function tearDown(): void{
        parent::tearDown();
    }

    protected function setUp(): void{
        parent::setUp();
        $this->bookingDates = TestHelper::bookingDates();
    }
}
