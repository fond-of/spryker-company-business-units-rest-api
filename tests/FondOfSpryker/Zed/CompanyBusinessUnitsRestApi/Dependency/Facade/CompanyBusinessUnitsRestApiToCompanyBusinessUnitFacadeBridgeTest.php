<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Dependency\Facade;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Spryker\Zed\CompanyBusinessUnit\Business\CompanyBusinessUnitFacadeInterface;

class CompanyBusinessUnitsRestApiToCompanyBusinessUnitFacadeBridgeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Dependency\Facade\CompanyBusinessUnitsRestApiToCompanyBusinessUnitFacadeBridge
     */
    protected $companyBusinessUnitsRestApiToCompanyBusinessUnitFacadeBridge;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\CompanyBusinessUnit\Business\CompanyBusinessUnitFacadeInterface
     */
    protected $companyBusinessUnitFacadeInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    protected $companyBusinessUnitTransferMock;

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

        $this->companyBusinessUnitFacadeInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitTransferMock = $this->getMockBuilder(CompanyBusinessUnitTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitResponseTransferMock = $this->getMockBuilder(CompanyBusinessUnitResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsRestApiToCompanyBusinessUnitFacadeBridge = new CompanyBusinessUnitsRestApiToCompanyBusinessUnitFacadeBridge(
            $this->companyBusinessUnitFacadeInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testCreate(): void
    {
        $this->companyBusinessUnitFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('create')
            ->willReturn($this->companyBusinessUnitResponseTransferMock);

        $this->assertInstanceOf(
            CompanyBusinessUnitResponseTransfer::class,
            $this->companyBusinessUnitsRestApiToCompanyBusinessUnitFacadeBridge->create(
                $this->companyBusinessUnitTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testUpdate(): void
    {
        $this->companyBusinessUnitFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('update')
            ->willReturn($this->companyBusinessUnitResponseTransferMock);

        $this->assertInstanceOf(
            CompanyBusinessUnitResponseTransfer::class,
            $this->companyBusinessUnitsRestApiToCompanyBusinessUnitFacadeBridge->update(
                $this->companyBusinessUnitTransferMock
            )
        );
    }
}
