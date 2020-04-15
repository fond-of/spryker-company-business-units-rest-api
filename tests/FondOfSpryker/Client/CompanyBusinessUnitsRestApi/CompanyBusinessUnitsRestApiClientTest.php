<?php

namespace FondOfSpryker\Client\CompanyBusinessUnitsRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Zed\CompanyBusinessUnitsRestApiStubInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

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
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Zed\CompanyBusinessUnitsRestApiStubInterface
     */
    protected $companyBusinessUnitsRestApiStubInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer
     */
    protected $companyBusinessUnitResponseTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    protected $companyBusinessUnitTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer
     */
    protected $companyBusinessUnitCollectionTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyBusinessUnitsRestApiFactoryMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsRestApiStubInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiStubInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitResponseTransferMock = $this->getMockBuilder(CompanyBusinessUnitResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitTransferMock = $this->getMockBuilder(CompanyBusinessUnitTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitCollectionTransferMock = $this->getMockBuilder(CompanyBusinessUnitCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsRestApiClient = new CompanyBusinessUnitsRestApiClient();
        $this->companyBusinessUnitsRestApiClient->setFactory($this->companyBusinessUnitsRestApiFactoryMock);
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitByUuid(): void
    {
        $this->companyBusinessUnitsRestApiFactoryMock->expects($this->atLeastOnce())
            ->method('createZedCompanyBusinessUnitsRestApiStub')
            ->willReturn($this->companyBusinessUnitsRestApiStubInterfaceMock);

        $this->companyBusinessUnitsRestApiStubInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitByUuid')
            ->with($this->companyBusinessUnitTransferMock)
            ->willReturn($this->companyBusinessUnitResponseTransferMock);

        $this->assertInstanceOf(
            CompanyBusinessUnitResponseTransfer::class,
            $this->companyBusinessUnitsRestApiClient->findCompanyBusinessUnitByUuid(
                $this->companyBusinessUnitTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitCollectionByIdCustomer(): void
    {
        $this->companyBusinessUnitsRestApiFactoryMock->expects($this->atLeastOnce())
            ->method('createZedCompanyBusinessUnitsRestApiStub')
            ->willReturn($this->companyBusinessUnitsRestApiStubInterfaceMock);

        $this->companyBusinessUnitsRestApiStubInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitCollectionByIdCustomer')
            ->with($this->customerTransferMock)
            ->willReturn($this->companyBusinessUnitCollectionTransferMock);

        $this->assertInstanceOf(
            CompanyBusinessUnitCollectionTransfer::class,
            $this->companyBusinessUnitsRestApiClient->findCompanyBusinessUnitCollectionByIdCustomer(
                $this->customerTransferMock
            )
        );
    }
}
