<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepositoryInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer;

class CompanyBusinessUnitReaderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitReader
     */
    protected $companyBusinessUnitReader;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepositoryInterface
     */
    protected $companyBusinessUnitsRestApiRepositoryInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer
     */
    protected $restCompanyBusinessUnitsRequestAttributesTransferMock;

    /**
     * @var string
     */
    protected $externalReference;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    protected $companyBusinessUnitTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var int
     */
    protected $idCustomer;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer
     */
    protected $companyBusinessUnitCollectionTransferMock;

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

        $this->restCompanyBusinessUnitsRequestAttributesTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->externalReference = 'external-reference';

        $this->companyBusinessUnitTransferMock = $this->getMockBuilder(CompanyBusinessUnitTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->idCustomer = 1;

        $this->companyBusinessUnitCollectionTransferMock = $this->getMockBuilder(CompanyBusinessUnitCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->uuid = 'uuid';

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

        $this->assertInstanceOf(
            CompanyBusinessUnitCollectionTransfer::class,
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
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->assertInstanceOf(
            CompanyBusinessUnitResponseTransfer::class,
            $this->companyBusinessUnitReader->findCompanyBusinessUnitByUuid(
                $this->companyBusinessUnitTransferMock
            )
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

        $this->assertInstanceOf(
            CompanyBusinessUnitResponseTransfer::class,
            $this->companyBusinessUnitReader->findCompanyBusinessUnitByUuid(
                $this->companyBusinessUnitTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitByExternalReference(): void
    {
        $this->restCompanyBusinessUnitsRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getExternalReference')
            ->willReturn($this->externalReference);

        $this->companyBusinessUnitsRestApiRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitByExternalReference')
            ->with($this->externalReference)
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->companyBusinessUnitTransferMock->expects($this->atLeastOnce())
            ->method('toArray')
            ->willReturn([]);

        $this->assertInstanceOf(
            RestCompanyBusinessUnitsResponseTransfer::class,
            $this->companyBusinessUnitReader->findCompanyBusinessUnitByExternalReference(
                $this->restCompanyBusinessUnitsRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitByExternalReferenceNotFound(): void
    {
        $this->restCompanyBusinessUnitsRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getExternalReference')
            ->willReturn($this->externalReference);

        $this->companyBusinessUnitsRestApiRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitByExternalReference')
            ->with($this->externalReference)
            ->willReturn(null);

        $this->assertInstanceOf(
            RestCompanyBusinessUnitsResponseTransfer::class,
            $this->companyBusinessUnitReader->findCompanyBusinessUnitByExternalReference(
                $this->restCompanyBusinessUnitsRequestAttributesTransferMock
            )
        );
    }
}
