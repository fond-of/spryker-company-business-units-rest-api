<?php

namespace FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Zed;

use Codeception\Test\Unit;
use FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Dependency\Client\CompanyBusinessUnitsRestApiToZedRequestClientInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

class CompanyBusinessUnitsRestApiStubTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Zed\CompanyBusinessUnitsRestApiStub
     */
    protected $companyBusinessUnitsRestApiStub;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Dependency\Client\CompanyBusinessUnitsRestApiToZedRequestClientInterface
     */
    protected $zedRequestClientMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer
     */
    protected $companyBusinessUnitCollectionTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    protected $companyBusinessUnitTransferMock;

    /**
     * @var string
     */
    protected $findCompanyBusinessUnitByUuidUrl;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var string
     */
    protected $findCompanyBusinessUnitCollectionByIdCustomer;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer
     */
    protected $companyBusinessUnitResponseTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->zedRequestClientMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiToZedRequestClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitCollectionTransferMock = $this->getMockBuilder(CompanyBusinessUnitCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitTransferMock = $this->getMockBuilder(CompanyBusinessUnitTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->findCompanyBusinessUnitByUuidUrl = '/company-business-units-rest-api/gateway/find-company-business-unit-by-uuid';

        $this->findCompanyBusinessUnitCollectionByIdCustomer = '/company-business-units-rest-api/gateway/find-company-business-unit-collection-by-id-customer';

        $this->companyBusinessUnitResponseTransferMock = $this->getMockBuilder(CompanyBusinessUnitResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsRestApiStub = new CompanyBusinessUnitsRestApiStub(
            $this->zedRequestClientMock
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitByUuid(): void
    {
        $this->zedRequestClientMock->expects($this->atLeastOnce())
            ->method('call')
            ->with($this->findCompanyBusinessUnitByUuidUrl, $this->companyBusinessUnitTransferMock)
            ->willReturn($this->companyBusinessUnitResponseTransferMock);

        $this->assertInstanceOf(
            CompanyBusinessUnitResponseTransfer::class,
            $this->companyBusinessUnitsRestApiStub->findCompanyBusinessUnitByUuid(
                $this->companyBusinessUnitTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitCollectionByIdCustomer(): void
    {
        $this->zedRequestClientMock->expects($this->atLeastOnce())
            ->method('call')
            ->with($this->findCompanyBusinessUnitCollectionByIdCustomer, $this->customerTransferMock)
            ->willReturn($this->companyBusinessUnitCollectionTransferMock);

        $this->assertInstanceOf(
            CompanyBusinessUnitCollectionTransfer::class,
            $this->companyBusinessUnitsRestApiStub->findCompanyBusinessUnitCollectionByIdCustomer(
                $this->customerTransferMock
            )
        );
    }
}
