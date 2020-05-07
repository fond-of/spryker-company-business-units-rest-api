<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitReader;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepository;

class CompanyBusinessUnitsRestApiBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiBusinessFactory
     */
    protected $companyBusinessUnitsRestApiBusinessFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepository
     */
    protected $companyBusinessUnitsRestApiRepositoryMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->companyBusinessUnitsRestApiRepositoryMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsRestApiBusinessFactory = new CompanyBusinessUnitsRestApiBusinessFactory();
        $this->companyBusinessUnitsRestApiBusinessFactory->setRepository($this->companyBusinessUnitsRestApiRepositoryMock);
    }

    /**
     * @return void
     */
    public function testCreateCompanyBusinessUnitReader(): void
    {
        $this->assertInstanceOf(
            CompanyBusinessUnitReader::class,
            $this->companyBusinessUnitsRestApiBusinessFactory->createCompanyBusinessUnitReader()
        );
    }
}
