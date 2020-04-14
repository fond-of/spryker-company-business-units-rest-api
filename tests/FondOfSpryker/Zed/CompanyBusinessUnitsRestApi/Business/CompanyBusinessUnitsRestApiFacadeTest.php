<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitMapperInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitReaderInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitWriterInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepository;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestTransfer;
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
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    protected $restCompanyBusinessUnitsResponseTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitWriterInterface
     */
    protected $companyBusinessUnitWriterInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    protected $companyBusinessUnitTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitMapperInterface
     */
    protected $companyBusinessUnitMapperInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestTransfer
     */
    protected $restCompanyBusinessUnitsRequestTransferMock;

    /**
     * @var string
     */
    protected $externalReference;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepository
     */
    protected $companyBusinessUnitsRestApiRepositoryMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

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

        $this->restCompanyBusinessUnitsResponseTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitWriterInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitWriterInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitMapperInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitMapperInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitTransferMock = $this->getMockBuilder(CompanyBusinessUnitTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitsRequestTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsRequestTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->externalReference = "external-reference";

        $this->companyBusinessUnitsRestApiFacade = new CompanyBusinessUnitsRestApiFacade();
        $this->companyBusinessUnitsRestApiFacade->setFactory($this->companyBusinessUnitsRestApiBusinessFactoryMock);
        $this->companyBusinessUnitsRestApiFacade->setRepository($this->companyBusinessUnitsRestApiRepositoryMock);
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
            ->willReturn($this->restCompanyBusinessUnitsResponseTransferMock);

        $this->assertInstanceOf(
            RestCompanyBusinessUnitsResponseTransfer::class,
            $this->companyBusinessUnitsRestApiFacade->findCompanyBusinessUnitByUuid(
                $this->restCompanyBusinessUnitsRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testCreate(): void
    {
        $this->companyBusinessUnitsRestApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyBusinessUnitWriter')
            ->willReturn($this->companyBusinessUnitWriterInterfaceMock);

        $this->companyBusinessUnitWriterInterfaceMock->expects($this->atLeastOnce())
            ->method('create')
            ->willReturn($this->restCompanyBusinessUnitsResponseTransferMock);

        $this->assertInstanceOf(
            RestCompanyBusinessUnitsResponseTransfer::class,
            $this->companyBusinessUnitsRestApiFacade->create(
                $this->restCompanyBusinessUnitsRequestAttributesTransferMock
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
    public function testUpdate(): void
    {
        $this->companyBusinessUnitsRestApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyBusinessUnitWriter')
            ->willReturn($this->companyBusinessUnitWriterInterfaceMock);

        $this->companyBusinessUnitWriterInterfaceMock->expects($this->atLeastOnce())
            ->method('update')
            ->willReturn($this->restCompanyBusinessUnitsResponseTransferMock);

        $this->assertInstanceOf(
            RestCompanyBusinessUnitsResponseTransfer::class,
            $this->companyBusinessUnitsRestApiFacade->update(
                $this->restCompanyBusinessUnitsRequestTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindByExternalReference(): void
    {
        $this->companyBusinessUnitsRestApiRepositoryMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitByExternalReference')
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->assertInstanceOf(
            CompanyBusinessUnitTransfer::class,
            $this->companyBusinessUnitsRestApiFacade->findByExternalReference(
                $this->externalReference
            )
        );
    }
}
