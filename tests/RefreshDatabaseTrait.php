<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Contracts\Console\Kernel;

trait RefreshDatabaseTrait
{
    use RefreshDatabase;

    /**
     * Refresh the in-memory database.
     *
     * @return void
     */
    protected function refreshInMemoryDatabase()
    {
        Artisan::call('migrate:fresh --env=testing --seed');

        $this->app[Kernel::class]->setArtisan(null);
    }

}
