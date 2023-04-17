<?php

namespace Sfolador\Heidipay;

use Sfolador\Heidipay\Interfaces\HeidipayInterface;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HeidipayServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('heidipay')
            ->hasConfigFile();
    }

    public function packageRegistered(): void
    {
        $this->app->bind(HeidipayInterface::class, function () {
            return new Heidipay(
                apiUrl: config('heidipay.api_url'),
                merchantKey: config('heidipay.merchant_key')
            );
        });
    }
}
