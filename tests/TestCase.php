<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Helpers\TestHelper;
use Illuminate\Support\Facades\Artisan;

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

    /**
     * Refresh the in-memory database.
     *
     * @return void
     */
    protected function refreshInMemoryDatabase()
    {
        //$this->artisan('migrate', $this->migrateUsing());

        Artisan::call('migrate:fresh --seed --env=testing');

        $this->app[Kernel::class]->setArtisan(null);
    }
}
