<?php

namespace FondOfSpryker\Client\CompanyBusinessUnitsRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Zed\CompanyBusinessUnitsRestApiStubInterface;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer;

class CompanyBusinessUnitsRestApiClientTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiClient
     */
    protected $companyBusinessUnitsRestApiClient;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiFactory
     */
    protected $companyBusinessUnitsRestApiFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer
     */
    protected $restCompanyBusinessUnitsRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Zed\CompanyBusinessUnitsRestApiStubInterface
     */
    protected $companyBusinessUnitsRestApiStubInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    protected $restCompanyBusinessUnitsResponseTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestTransfer
     */
    protected $restCompanyBusinessUnitsRequestTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->companyBusinessUnitsRestApiFactoryMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitsRequestAttributesTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsRestApiStubInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiStubInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitsResponseTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitsRequestTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsRequestTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsRestApiClient = new CompanyBusinessUnitsRestApiClient();
        $this->companyBusinessUnitsRestApiClient->setFactory($this->companyBusinessUnitsRestApiFactoryMock);
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitByExternalReference(): void
    {
        $this->companyBusinessUnitsRestApiFactoryMock->expects($this->atLeastOnce())
            ->method('createZedCompanyBusinessUnitsRestApiStub')
            ->willReturn($this->companyBusinessUnitsRestApiStubInterfaceMock);

        $this->companyBusinessUnitsRestApiStubInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitByExternalReference')
            ->willReturn($this->restCompanyBusinessUnitsResponseTransferMock);

        $this->assertInstanceOf(
            RestCompanyBusinessUnitsResponseTransfer::class,
            $this->companyBusinessUnitsRestApiClient->findCompanyBusinessUnitByUuid(
                $this->restCompanyBusinessUnitsRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testCreate(): void
    {
        $this->companyBusinessUnitsRestApiFactoryMock->expects($this->atLeastOnce())
            ->method('createZedCompanyBusinessUnitsRestApiStub')
            ->willReturn($this->companyBusinessUnitsRestApiStubInterfaceMock);

        $this->companyBusinessUnitsRestApiStubInterfaceMock->expects($this->atLeastOnce())
            ->method('create')
            ->willReturn($this->restCompanyBusinessUnitsResponseTransferMock);

        $this->assertInstanceOf(
            RestCompanyBusinessUnitsResponseTransfer::class,
            $this->companyBusinessUnitsRestApiClient->create(
                $this->restCompanyBusinessUnitsRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testUpdate(): void
    {
        $this->companyBusinessUnitsRestApiFactoryMock->expects($this->atLeastOnce())
            ->method('createZedCompanyBusinessUnitsRestApiStub')
            ->willReturn($this->companyBusinessUnitsRestApiStubInterfaceMock);

        $this->companyBusinessUnitsRestApiStubInterfaceMock->expects($this->atLeastOnce())
            ->method('update')
            ->willReturn($this->restCompanyBusinessUnitsResponseTransferMock);

        $this->assertInstanceOf(
            RestCompanyBusinessUnitsResponseTransfer::class,
            $this->companyBusinessUnitsRestApiClient->update(
                $this->restCompanyBusinessUnitsRequestTransferMock
            )
        );
    }
}
