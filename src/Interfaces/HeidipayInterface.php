<?php

namespace Sfolador\Heidipay\Interfaces;

use Saloon\Contracts\Response;
use Sfolador\HeidiPaySaloon\Dto\ContractInitDto;

interface HeidipayInterface
{
    public function auth(): mixed;

    public function contract(ContractInitDto $contractInitDto): Response;
}
