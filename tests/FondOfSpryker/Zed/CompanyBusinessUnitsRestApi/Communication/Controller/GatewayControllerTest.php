<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Communication\Controller;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiFacadeInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

class GatewayControllerTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Communication\Controller\GatewayController
     */
    protected $gatewayController;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    protected $companyBusinessUnitTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiFacadeInterface
     */
    protected $companyBusinessUnitsRestApiFacadeInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer
     */
    protected $companyBusinessUnitResponseTransferMock;

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
        $this->companyBusinessUnitTransferMock = $this->getMockBuilder(CompanyBusinessUnitTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsRestApiFacadeInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitResponseTransferMock = $this->getMockBuilder(CompanyBusinessUnitResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitCollectionTransferMock = $this->getMockBuilder(CompanyBusinessUnitCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->gatewayController = new class (
            $this->companyBusinessUnitsRestApiFacadeInterfaceMock
        ) extends GatewayController {
            /**
             * @var \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiFacadeInterface
             */
            protected $companyBusinessUnitsRestApiFacade;

            /**
             * @param \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiFacadeInterface $companyBusinessUnitsRestApiFacade
             */
            public function __construct(CompanyBusinessUnitsRestApiFacadeInterface $companyBusinessUnitsRestApiFacade)
            {
                $this->companyBusinessUnitsRestApiFacade = $companyBusinessUnitsRestApiFacade;
            }

            /**
             * @return \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiFacadeInterface
             */
            public function getFacade(): CompanyBusinessUnitsRestApiFacadeInterface
            {
                return $this->companyBusinessUnitsRestApiFacade;
            }
        };
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitByUuidAction(): void
    {
        $this->companyBusinessUnitsRestApiFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitByUuid')
            ->with($this->companyBusinessUnitTransferMock)
            ->willReturn($this->companyBusinessUnitResponseTransferMock);

        $this->assertInstanceOf(
            CompanyBusinessUnitResponseTransfer::class,
            $this->gatewayController->findCompanyBusinessUnitByUuidAction(
                $this->companyBusinessUnitTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitCollectionByIdCustomerAction(): void
    {
        $this->companyBusinessUnitsRestApiFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitCollectionByIdCustomer')
            ->with($this->customerTransferMock)
            ->willReturn($this->companyBusinessUnitCollectionTransferMock);

        $this->assertInstanceOf(
            CompanyBusinessUnitCollectionTransfer::class,
            $this->gatewayController->findCompanyBusinessUnitCollectionByIdCustomerAction(
                $this->customerTransferMock
            )
        );
    }
}
