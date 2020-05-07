<?php

namespace FondOfSpryker\Client\CompanyBusinessUnitsRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Dependency\Client\CompanyBusinessUnitsRestApiToZedRequestClientInterface;
use FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Zed\CompanyBusinessUnitsRestApiStub;
use Spryker\Client\Kernel\Container;

class CompanyBusinessUnitsRestApiFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiFactory
     */
    protected $companyBusinessUnitsRestApiFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Client\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Dependency\Client\CompanyBusinessUnitsRestApiToZedRequestClientInterface
     */
    protected $companyBusinessUnitsRestApiToZedRequestClientInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsRestApiToZedRequestClientInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiToZedRequestClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsRestApiFactory = new CompanyBusinessUnitsRestApiFactory();
        $this->companyBusinessUnitsRestApiFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateZedCompanyBusinessUnitsRestApiStub(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(CompanyBusinessUnitsRestApiDependencyProvider::CLIENT_ZED_REQUEST)
            ->willReturn($this->companyBusinessUnitsRestApiToZedRequestClientInterfaceMock);

        $this->assertInstanceOf(
            CompanyBusinessUnitsRestApiStub::class,
            $this->companyBusinessUnitsRestApiFactory->createZedCompanyBusinessUnitsRestApiStub()
        );
    }
}
