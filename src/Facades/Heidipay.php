<?php

namespace Sfolador\Heidipay\Facades;

use Illuminate\Support\Facades\Facade;
use Sfolador\Heidipay\Interfaces\HeidipayInterface;

/**
 * @see \Sfolador\Heidipay\Heidipay
 */
class Heidipay extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return HeidipayInterface::class;
    }
}
