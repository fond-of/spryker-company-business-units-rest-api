<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi;

use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Dependency\Client\CompanyBusinessUnitsRestApiToCompanyBusinessUnitClientInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsReader;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsReaderInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsWriter;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsWriterInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Mapper\CompanyBusinessUnitsResourceMapper;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Mapper\CompanyBusinessUnitsResourceMapperInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiError;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiErrorInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiValidator;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiValidatorInterface;
use Spryker\Glue\Kernel\AbstractFactory;

class CompanyBusinessUnitsRestApiFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Dependency\Client\CompanyBusinessUnitsRestApiToCompanyBusinessUnitClientInterface
     */
    public function getCompanyBusinessUnitClient(): CompanyBusinessUnitsRestApiToCompanyBusinessUnitClientInterface
    {
        return $this->getProvidedDependency(CompanyBusinessUnitsRestApiDependencyProvider::CLIENT_COMPANY_BUSINESS_UNIT);
    }

    /**
     * @return \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsReaderInterface
     */
    public function createCompanyBusinessUnitsReader(): CompanyBusinessUnitsReaderInterface
    {
        return new CompanyBusinessUnitsReader(
            $this->getResourceBuilder(),
            $this->createCompanyBusinessUnitsResourceMapper(),
            $this->getCompanyBusinessUnitClient(),
            $this->createRestApiError(),
            $this->createRestApiValidator()
        );
    }

    /**
     * @return \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsWriterInterface
     */
    public function createCompanyBusinessUnitsWriter(): CompanyBusinessUnitsWriterInterface
    {
        return new CompanyBusinessUnitsWriter(
            $this->getResourceBuilder(),
            $this->createCompanyBusinessUnitsResourceMapper(),
            $this->getCompanyBusinessUnitClient(),
            $this->createRestApiError(),
            $this->createRestApiValidator()
        );
    }

    /**
     * @return \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Mapper\CompanyBusinessUnitsResourceMapperInterface
     */
    public function createCompanyBusinessUnitsResourceMapper(): CompanyBusinessUnitsResourceMapperInterface
    {
        return new CompanyBusinessUnitsResourceMapper($this->getResourceBuilder());
    }

    /**
     * @return \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiErrorInterface
     */
    public function createRestApiError(): RestApiErrorInterface
    {
        return new RestApiError();
    }

    /**
     * @return \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiValidatorInterface
     */
    public function createRestApiValidator(): RestApiValidatorInterface
    {
        return new RestApiValidator($this->createRestApiError());
    }
}
