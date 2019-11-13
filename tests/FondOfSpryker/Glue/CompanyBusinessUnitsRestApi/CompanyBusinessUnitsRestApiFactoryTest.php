<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsMapperInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiErrorInterface;

class CompanyBusinessUnitsRestApiFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiFactory
     */
    protected $companyBusinessUnitsRestApiFactory;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->companyBusinessUnitsRestApiFactory = new CompanyBusinessUnitsRestApiFactory();
    }

    /**
     * @return void
     */
    public function testCreateRestApiError(): void
    {
        $this->assertInstanceOf(
            RestApiErrorInterface::class,
            $this->companyBusinessUnitsRestApiFactory->createRestApiError()
        );
    }

    /**
     * @return void
     */
    public function testCreateCompanyBusinessUnitsMapper(): void
    {
        $this->assertInstanceOf(
            CompanyBusinessUnitsMapperInterface::class,
            $this->companyBusinessUnitsRestApiFactory->createCompanyBusinessUnitsMapper()
        );
    }
}
