<?php

namespace FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Dependency\Client;

use Spryker\Shared\Kernel\Transfer\TransferInterface;

interface CompanyBusinessUnitsRestApiToZedRequestClientInterface
{
    /**
     * @param string $url
     * @param \Spryker\Shared\Kernel\Transfer\TransferInterface $object
     * @param array|null $requestOptions
     *
     * @return \Spryker\Shared\Kernel\Transfer\TransferInterface
     */
    public function call($url, TransferInterface $object, $requestOptions = null): TransferInterface;
}
