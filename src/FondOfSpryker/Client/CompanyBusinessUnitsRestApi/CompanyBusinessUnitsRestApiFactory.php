<?php

namespace FondOfSpryker\Client\CompanyBusinessUnitsRestApi;

use FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Dependency\Client\CompanyBusinessUnitsRestApiToZedRequestClientInterface;
use FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Zed\CompanyBusinessUnitsRestApiStub;
use FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Zed\CompanyBusinessUnitsRestApiStubInterface;
use Spryker\Client\Kernel\AbstractFactory;

class CompanyBusinessUnitsRestApiFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Zed\CompanyBusinessUnitsRestApiStubInterface
     */
    public function createZedCompanyBusinessUnitsRestApiStub(): CompanyBusinessUnitsRestApiStubInterface
    {
        return new CompanyBusinessUnitsRestApiStub($this->getZedRequestClient());
    }

    /**
     * @return \FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Dependency\Client\CompanyBusinessUnitsRestApiToZedRequestClientInterface
     */
    protected function getZedRequestClient(): CompanyBusinessUnitsRestApiToZedRequestClientInterface
    {
        return $this->getProvidedDependency(CompanyBusinessUnitsRestApiDependencyProvider::CLIENT_ZED_REQUEST);
    }
}
