# HeidiPay for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sfolador/heidipay.svg?style=flat-square)](https://packagist.org/packages/sfolador/heidipay)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/sfolador/heidipay/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/sfolador/heidipay/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/sfolador/heidipay/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/sfolador/heidipay/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/sfolador/heidipay.svg?style=flat-square)](https://packagist.org/packages/sfolador/heidipay)


## Installation

You can install the package via composer:

```bash
composer require sfolador/heidipay
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="heidipay-config"
```

This is the contents of the published config file:

```php
return [
    'api_url' => 'https://sandbox-origination.heidipay.com/',
    'merchant_key' => 'your merchant key',
];
```

## Usage

```php

 $product = CreditInitProduct::from(sku: null, name: "Test", quantity: 1, price: 100, imageThumbnailUrl: null, imageOriginalUrl: null, description: "");
    $amount = Amount::from(currency: "EUR", amount: 100, format: AmountFormat::DECIMAL);
    $products = [$product];
    $consumer = Customer::from(email: "sfolador@gmail.com", title: null, firstname: "simone", lastname: "folador", dateOfBirth: null, contactNumber: null, companyName: null, residence: null);

    $webhooks = Webhooks::from(
        success: "https://www.example.com/heidi-success",
        failure: "https://www.example.com/heidi-failure",
        cancel: "https://www.example.com/heidi-cancel",
        status: "https://www.example.com/heidi-status",
        mappingScheme: "default"
    );

    $webhooks->setToken(str()->random(32));

    $contractInitDto = ContractInitDto::from(amount: $amount, customer: $consumer, webhooks: $webhooks, products: $products);

    $hp =\Sfolador\Heidipay\Facades\Heidipay::contract($contractInitDto);
    dd($hp->dto());
    
/**
* 
* Sfolador\HeidiPaySaloon\Dto\Response\ContractDto {#479 ▼ // routes/web.php:201
  +action: "REDIRECT"
  +redirect_url: "https://sandbox-checkout.heidipay.com?otc=f8952b8c-919d-4d7f-a54c-70027d5f0a55&fallback=https%3A%2F%2Flaravel-10.test%2Fheidi-failure"
  +external_contract_uuid: "b3df38c4-6cdb-4224-adb9-6878922721ff"
  +application_uuid: "07ef7950-3189-4a11-be6e-98b1d88a9340"
}
 */

```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Simone Folador](https://github.com/sfolador)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
