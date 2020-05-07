<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitReaderInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

class CompanyBusinessUnitsRestApiFacadeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiFacade
     */
    protected $companyBusinessUnitsRestApiFacade;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiBusinessFactory
     */
    protected $companyBusinessUnitsRestApiBusinessFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitReaderInterface
     */
    protected $companyBusinessUnitReaderInterfaceMock;

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
        $this->companyBusinessUnitsRestApiBusinessFactoryMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitReaderInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitReaderInterface::class)
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

        $this->companyBusinessUnitsRestApiFacade = new CompanyBusinessUnitsRestApiFacade();
        $this->companyBusinessUnitsRestApiFacade->setFactory($this->companyBusinessUnitsRestApiBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitByUuid(): void
    {
        $this->companyBusinessUnitsRestApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyBusinessUnitReader')
            ->willReturn($this->companyBusinessUnitReaderInterfaceMock);

        $this->companyBusinessUnitReaderInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitByUuid')
            ->with($this->companyBusinessUnitTransferMock)
            ->willReturn($this->companyBusinessUnitResponseTransferMock);

        $companyBusinessUnitResponseTransfer = $this->companyBusinessUnitsRestApiFacade
            ->findCompanyBusinessUnitByUuid($this->companyBusinessUnitTransferMock);

        $this->assertEquals($this->companyBusinessUnitResponseTransferMock, $companyBusinessUnitResponseTransfer);
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitCollectionByIdCustomer(): void
    {
        $this->companyBusinessUnitsRestApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyBusinessUnitReader')
            ->willReturn($this->companyBusinessUnitReaderInterfaceMock);

        $this->companyBusinessUnitReaderInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitCollectionByIdCustomer')
            ->with($this->customerTransferMock)
            ->willReturn($this->companyBusinessUnitCollectionTransferMock);

        $companyBusinessUnitCollectionTransfer = $this->companyBusinessUnitsRestApiFacade
            ->findCompanyBusinessUnitCollectionByIdCustomer($this->customerTransferMock);

        $this->assertEquals($this->companyBusinessUnitCollectionTransferMock, $companyBusinessUnitCollectionTransfer);
    }
}
