<?php

namespace Sfolador\Heidipay;

use ReflectionException;
use Saloon\Contracts\Response;
use Saloon\Exceptions\InvalidResponseClassException;
use Saloon\Exceptions\PendingRequestException;
use Sfolador\Heidipay\Interfaces\HeidipayInterface;
use Sfolador\HeidiPaySaloon\Dto\AuthDto;
use Sfolador\HeidiPaySaloon\Dto\ContractInitDto;

class Heidipay implements HeidipayInterface
{
    private \Sfolador\HeidiPaySaloon\Services\HeidiPay $heidiPay;

    private AuthDto $authDto;

    public function __construct(string $apiUrl, string $merchantKey)
    {
        $this->heidiPay = \Sfolador\HeidiPaySaloon\Services\HeidiPay::init($apiUrl);
        $this->authDto = AuthDto::from(merchantKey: $merchantKey);

    }

    /**
     * @throws ReflectionException
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     */
    public function auth(): mixed
    {
        return $this->heidiPay->auth($this->authDto);
    }

    /**
     * @throws ReflectionException
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     */
    public function contract(ContractInitDto $contractInitDto): Response
    {
        $this->auth();

        return $this->heidiPay->contract($contractInitDto);
    }
}
