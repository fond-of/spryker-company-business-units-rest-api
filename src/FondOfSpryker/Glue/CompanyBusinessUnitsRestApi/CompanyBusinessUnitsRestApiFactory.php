<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi;

use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsReader;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsReaderInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsWriter;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsWriterInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiError;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiErrorInterface;
use Spryker\Glue\Kernel\AbstractFactory;
use Spryker\Yves\Kernel\ClientResolverAwareTrait;

/**
 * @method \FondOfSpryker\Client\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiClientInterface getClient()
 */
class CompanyBusinessUnitsRestApiFactory extends AbstractFactory
{
    use ClientResolverAwareTrait;

    /**
     * @return \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsReaderInterface
     */
    public function createCompanyBusinessUnitsReader(): CompanyBusinessUnitsReaderInterface
    {
        return new CompanyBusinessUnitsReader(
            $this->getResourceBuilder(),
            $this->getClient(),
            $this->createRestApiError()
        );
    }

    /**
     * @return \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsWriterInterface
     */
    public function createCompanyBusinessUnitsWriter(): CompanyBusinessUnitsWriterInterface
    {
        return new CompanyBusinessUnitsWriter(
            $this->getResourceBuilder(),
            $this->getClient(),
            $this->createRestApiError()
        );
    }

    /**
     * @return \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiErrorInterface
     */
    public function createRestApiError(): RestApiErrorInterface
    {
        return new RestApiError();
    }
}
