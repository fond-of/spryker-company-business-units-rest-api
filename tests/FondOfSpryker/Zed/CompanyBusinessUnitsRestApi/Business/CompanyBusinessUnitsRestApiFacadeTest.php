<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitMapperInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitReaderInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepository;
use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer;

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
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer
     */
    protected $restCompanyBusinessUnitsRequestAttributesTransferMock;

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
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitMapperInterface
     */
    protected $companyBusinessUnitMapperInterfaceMock;

    /**
     * @var string
     */
    protected $externalReference;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepository
     */
    protected $companyBusinessUnitsRestApiRepositoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    protected $restCompanyBusinessUnitsResponseTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyBusinessUnitsRestApiBusinessFactoryMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsRestApiRepositoryMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitsRequestAttributesTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitReaderInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitReaderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitResponseTransferMock = $this->getMockBuilder(CompanyBusinessUnitResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitMapperInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitMapperInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitTransferMock = $this->getMockBuilder(CompanyBusinessUnitTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->externalReference = 'external-reference';

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitsResponseTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsRestApiFacade = new CompanyBusinessUnitsRestApiFacade();
        $this->companyBusinessUnitsRestApiFacade->setFactory($this->companyBusinessUnitsRestApiBusinessFactoryMock);
        $this->companyBusinessUnitsRestApiFacade->setRepository($this->companyBusinessUnitsRestApiRepositoryMock);
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
            ->willReturn($this->companyBusinessUnitResponseTransferMock);

        $this->assertInstanceOf(
            CompanyBusinessUnitResponseTransfer::class,
            $this->companyBusinessUnitsRestApiFacade->findCompanyBusinessUnitByUuid(
                $this->companyBusinessUnitTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitCollectionByIdCustomer(): void
    {
        $this->assertInstanceOf(
            CompanyBusinessUnitCollectionTransfer::class,
            $this->companyBusinessUnitsRestApiFacade->findCompanyBusinessUnitCollectionByIdCustomer(
                $this->customerTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testMapToCompanyBusinessUnit(): void
    {
        $this->companyBusinessUnitsRestApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyBusinessUnitMapper')
            ->willReturn($this->companyBusinessUnitMapperInterfaceMock);

        $this->companyBusinessUnitMapperInterfaceMock->expects($this->atLeastOnce())
            ->method('mapToCompanyBusinessUnit')
            ->with($this->restCompanyBusinessUnitsRequestAttributesTransferMock)
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->assertInstanceOf(
            CompanyBusinessUnitTransfer::class,
            $this->companyBusinessUnitsRestApiFacade->mapToCompanyBusinessUnit(
                $this->restCompanyBusinessUnitsRequestAttributesTransferMock,
                $this->companyBusinessUnitTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitByExternalReference(): void
    {
        $this->companyBusinessUnitsRestApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyBusinessUnitReader')
            ->willReturn($this->companyBusinessUnitReaderInterfaceMock);

        $this->companyBusinessUnitReaderInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitByExternalReference')
            ->with($this->restCompanyBusinessUnitsRequestAttributesTransferMock)
            ->willReturn($this->restCompanyBusinessUnitsResponseTransferMock);

        $this->assertInstanceOf(
            RestCompanyBusinessUnitsResponseTransfer::class,
            $this->companyBusinessUnitsRestApiFacade->findCompanyBusinessUnitByExternalReference(
                $this->restCompanyBusinessUnitsRequestAttributesTransferMock
            )
        );
    }
}
