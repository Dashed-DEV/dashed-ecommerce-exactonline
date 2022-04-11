<?php

namespace Qubiqx\QcommerceEcommerceExactonline\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Qubiqx\QcommerceEcommerceExactonline\QcommerceEcommerceExactonlineServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Qubiqx\\QcommerceEcommerceExactonline\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            QcommerceEcommerceExactonlineServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_qcommerce-ecommerce-exactonline_table.php.stub';
        $migration->up();
        */
    }
}
