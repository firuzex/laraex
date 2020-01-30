<?php

namespace Firuzex\Laraex\Tests;

use Orchestra\Testbench\TestCase;
use Firuzex\Laraex\LaraexServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaraexServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
