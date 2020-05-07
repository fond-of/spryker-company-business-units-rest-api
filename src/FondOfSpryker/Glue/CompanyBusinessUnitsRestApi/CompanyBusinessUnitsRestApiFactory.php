<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi;

use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsMapper;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsMapperInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsReader;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsReaderInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsResourceRelationshipExpander;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsResourceRelationshipExpanderInterface;
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
            $this->createCompanyBusinessUnitsMapper(),
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

    /**
     * @return \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsResourceRelationshipExpanderInterface
     */
    public function createCompanyBusinessUnitsResourceRelationshipExpander(): CompanyBusinessUnitsResourceRelationshipExpanderInterface
    {
        return new CompanyBusinessUnitsResourceRelationshipExpander(
            $this->getResourceBuilder(),
            $this->createCompanyBusinessUnitsMapper()
        );
    }

    /**
     * @return \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsMapperInterface
     */
    public function createCompanyBusinessUnitsMapper(): CompanyBusinessUnitsMapperInterface
    {
        return new CompanyBusinessUnitsMapper();
    }
}
