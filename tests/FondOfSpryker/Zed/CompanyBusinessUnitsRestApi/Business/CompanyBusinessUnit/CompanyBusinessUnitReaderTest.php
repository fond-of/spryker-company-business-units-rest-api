<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepositoryInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

class CompanyBusinessUnitReaderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitReaderInterface
     */
    protected $companyBusinessUnitReader;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepositoryInterface
     */
    protected $companyBusinessUnitsRestApiRepositoryInterfaceMock;

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
     * @var int
     */
    protected $idCustomer;

    /**
     * @var string
     */
    protected $uuid;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyBusinessUnitsRestApiRepositoryInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiRepositoryInterface::class)
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

        $this->uuid = 'uuid';

        $this->idCustomer = 1;

        $this->companyBusinessUnitReader = new CompanyBusinessUnitReader(
            $this->companyBusinessUnitsRestApiRepositoryInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitCollectionByIdCustomer(): void
    {
        $this->customerTransferMock->expects($this->atLeastOnce())
            ->method('requireIdCustomer')
            ->willReturnSelf();

        $this->customerTransferMock->expects($this->atLeastOnce())
            ->method('getIdCustomer')
            ->willReturn($this->idCustomer);

        $this->companyBusinessUnitsRestApiRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitCollectionByIdCustomer')
            ->with($this->idCustomer)
            ->willReturn($this->companyBusinessUnitCollectionTransferMock);

        $this->assertEquals(
            $this->companyBusinessUnitCollectionTransferMock,
            $this->companyBusinessUnitReader->findCompanyBusinessUnitCollectionByIdCustomer(
                $this->customerTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitByUuid(): void
    {
        $this->companyBusinessUnitTransferMock->expects($this->atLeastOnce())
            ->method('requireUuid')
            ->willReturnSelf();

        $this->companyBusinessUnitTransferMock->expects($this->atLeastOnce())
            ->method('getUuid')
            ->willReturn($this->uuid);

        $this->companyBusinessUnitsRestApiRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitByUuid')
            ->with($this->uuid)
            ->willReturn($this->companyBusinessUnitTransferMock);

        $companyBusinessUnitResponseTransfer = $this->companyBusinessUnitReader->findCompanyBusinessUnitByUuid(
            $this->companyBusinessUnitTransferMock
        );

        $this->assertTrue($companyBusinessUnitResponseTransfer->getIsSuccessful());
        $this->assertEquals(
            $this->companyBusinessUnitTransferMock,
            $companyBusinessUnitResponseTransfer->getCompanyBusinessUnitTransfer()
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitByUuidFail(): void
    {
        $this->companyBusinessUnitTransferMock->expects($this->atLeastOnce())
            ->method('requireUuid')
            ->willReturnSelf();

        $this->companyBusinessUnitTransferMock->expects($this->atLeastOnce())
            ->method('getUuid')
            ->willReturn($this->uuid);

        $this->companyBusinessUnitsRestApiRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitByUuid')
            ->willReturn(null);

        $companyBusinessUnitResponseTransfer = $this->companyBusinessUnitReader->findCompanyBusinessUnitByUuid(
            $this->companyBusinessUnitTransferMock
        );

        $this->assertFalse($companyBusinessUnitResponseTransfer->getIsSuccessful());
        $this->assertEquals(
            null,
            $companyBusinessUnitResponseTransfer->getCompanyBusinessUnitTransfer()
        );
    }
}
