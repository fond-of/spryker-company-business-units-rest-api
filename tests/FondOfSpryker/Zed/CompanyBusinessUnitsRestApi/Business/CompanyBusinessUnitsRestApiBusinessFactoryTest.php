<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitMapperInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitReaderInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitWriterInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiDependencyProvider;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Dependency\Facade\CompanyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepository;
use Spryker\Zed\Kernel\Container;

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
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Dependency\Facade\CompanyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterface
     */
    protected $companyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterfaceMock;

    /**
     * @var array
     */
    protected $companyBusinessUnitMapperPlugins;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->companyBusinessUnitsRestApiRepositoryMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitMapperPlugins = [];

        $this->companyBusinessUnitsRestApiBusinessFactory = new CompanyBusinessUnitsRestApiBusinessFactory();
        $this->companyBusinessUnitsRestApiBusinessFactory->setRepository($this->companyBusinessUnitsRestApiRepositoryMock);
        $this->companyBusinessUnitsRestApiBusinessFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateCompanyBusinessUnitReader(): void
    {
        $this->assertInstanceOf(
            CompanyBusinessUnitReaderInterface::class,
            $this->companyBusinessUnitsRestApiBusinessFactory->createCompanyBusinessUnitReader()
        );
    }

    /**
     * @return void
     */
    public function testCreateCompanyBusinessUnitWriter(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->withConsecutive(
                [CompanyBusinessUnitsRestApiDependencyProvider::FACADE_COMPANY_BUSINESS_UNIT],
                [CompanyBusinessUnitsRestApiDependencyProvider::PLUGINS_COMPANY_BUSINESS_UNIT_MAPPER]
            )
            ->willReturnOnConsecutiveCalls(
                $this->companyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterfaceMock,
                $this->companyBusinessUnitMapperPlugins
            );

        $this->assertInstanceOf(
            CompanyBusinessUnitWriterInterface::class,
            $this->companyBusinessUnitsRestApiBusinessFactory->createCompanyBusinessUnitWriter()
        );
    }

    /**
     * @return void
     */
    public function testCreateCompanyBusinessUnitMapper(): void
    {
        $this->assertInstanceOf(
            CompanyBusinessUnitMapperInterface::class,
            $this->companyBusinessUnitsRestApiBusinessFactory->createCompanyBusinessUnitMapper()
        );
    }
}
