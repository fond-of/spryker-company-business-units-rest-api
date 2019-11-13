<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Dependency\Facade\CompanyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Dependency\Plugin\CompanyBusinessUnitMapperPluginInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepositoryInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer;
use Propel\Runtime\Exception\PropelException;

class CompanyBusinessUnitWriterTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitWriter
     */
    protected $companyBusinessUnitWriter;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepositoryInterface
     */
    protected $companyBusinessUnitsRestApiRepositoryInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Dependency\Facade\CompanyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterface
     */
    protected $companyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterfaceMock;

    /**
     * @var array
     */
    protected $companyBusinessUnitMapperPlugins;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer
     */
    protected $restCompanyBusinessUnitsRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Dependency\Plugin\CompanyBusinessUnitMapperPluginInterface
     */
    protected $companyBusinessUnitMapperPluginInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    protected $companyBusinessUnitTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer
     */
    protected $companyBusinessUnitResponseTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestTransfer
     */
    protected $restCompanyBusinessUnitsRequestTransferMock;

    /**
     * @var int
     */
    protected $id;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->companyBusinessUnitsRestApiRepositoryInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitMapperPluginInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitMapperPluginInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitMapperPlugins = [
            $this->companyBusinessUnitMapperPluginInterfaceMock,
        ];

        $this->restCompanyBusinessUnitsRequestAttributesTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitTransferMock = $this->getMockBuilder(CompanyBusinessUnitTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitResponseTransferMock = $this->getMockBuilder(CompanyBusinessUnitResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitsRequestTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsRequestTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->id = 1;

        $this->companyBusinessUnitWriter = new CompanyBusinessUnitWriter(
            $this->companyBusinessUnitsRestApiRepositoryInterfaceMock,
            $this->companyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterfaceMock,
            $this->companyBusinessUnitMapperPlugins
        );
    }

    /**
     * @return void
     */
    public function testCreate(): void
    {
        $this->companyBusinessUnitMapperPluginInterfaceMock->expects($this->atLeastOnce())
            ->method('map')
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->companyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('create')
            ->willReturn($this->companyBusinessUnitResponseTransferMock);

        $this->companyBusinessUnitResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccessful')
            ->willReturn(true);

        $this->companyBusinessUnitResponseTransferMock->expects($this->atLeastOnce())
            ->method('getCompanyBusinessUnitTransfer')
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->companyBusinessUnitTransferMock->expects($this->atLeastOnce())
            ->method('toArray')
            ->willReturn([]);

        $this->assertInstanceOf(
            RestCompanyBusinessUnitsResponseTransfer::class,
            $this->companyBusinessUnitWriter->create(
                $this->restCompanyBusinessUnitsRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testCreateCompanyBusinessUnitDataInvalid(): void
    {
        $this->companyBusinessUnitMapperPluginInterfaceMock->expects($this->atLeastOnce())
            ->method('map')
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->companyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('create')
            ->willReturn($this->companyBusinessUnitResponseTransferMock);

        $this->companyBusinessUnitResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccessful')
            ->willReturn(false);

        $this->assertInstanceOf(
            RestCompanyBusinessUnitsResponseTransfer::class,
            $this->companyBusinessUnitWriter->create(
                $this->restCompanyBusinessUnitsRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testCreateCatch(): void
    {
        $this->companyBusinessUnitMapperPluginInterfaceMock->expects($this->atLeastOnce())
            ->method('map')
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->companyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('create')
            ->willThrowException(new PropelException());

        $this->assertInstanceOf(
            RestCompanyBusinessUnitsResponseTransfer::class,
            $this->companyBusinessUnitWriter->create(
                $this->restCompanyBusinessUnitsRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testUpdate(): void
    {
        $this->restCompanyBusinessUnitsRequestTransferMock->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn($this->id);

        $this->companyBusinessUnitsRestApiRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitByExternalReference')
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->restCompanyBusinessUnitsRequestTransferMock->expects($this->atLeastOnce())
            ->method('getRestCompanyBusinessUnitsRequestAttributes')
            ->willReturn($this->restCompanyBusinessUnitsRequestAttributesTransferMock);

        $this->companyBusinessUnitMapperPluginInterfaceMock->expects($this->atLeastOnce())
            ->method('map')
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->companyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('update')
            ->willReturn($this->companyBusinessUnitResponseTransferMock);

        $this->companyBusinessUnitResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccessful')
            ->willReturn(true);

        $this->companyBusinessUnitResponseTransferMock->expects($this->atLeastOnce())
            ->method('getCompanyBusinessUnitTransfer')
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->companyBusinessUnitTransferMock->expects($this->atLeastOnce())
            ->method('toArray')
            ->willReturn([]);

        $this->assertInstanceOf(
            RestCompanyBusinessUnitsResponseTransfer::class,
            $this->companyBusinessUnitWriter->update(
                $this->restCompanyBusinessUnitsRequestTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testUpdateCompanyBusinessUnitFailed(): void
    {
        $this->restCompanyBusinessUnitsRequestTransferMock->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn($this->id);

        $this->companyBusinessUnitsRestApiRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitByExternalReference')
            ->willReturn(null);

        $this->assertInstanceOf(
            RestCompanyBusinessUnitsResponseTransfer::class,
            $this->companyBusinessUnitWriter->update(
                $this->restCompanyBusinessUnitsRequestTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testUpdateCatch(): void
    {
        $this->restCompanyBusinessUnitsRequestTransferMock->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn($this->id);

        $this->companyBusinessUnitsRestApiRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitByExternalReference')
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->restCompanyBusinessUnitsRequestTransferMock->expects($this->atLeastOnce())
            ->method('getRestCompanyBusinessUnitsRequestAttributes')
            ->willReturn($this->restCompanyBusinessUnitsRequestAttributesTransferMock);

        $this->companyBusinessUnitMapperPluginInterfaceMock->expects($this->atLeastOnce())
            ->method('map')
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->companyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('update')
            ->willThrowException(new PropelException());

        $this->assertInstanceOf(
            RestCompanyBusinessUnitsResponseTransfer::class,
            $this->companyBusinessUnitWriter->update(
                $this->restCompanyBusinessUnitsRequestTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testUpdateCompanyBusinessDataInvalid(): void
    {
        $this->restCompanyBusinessUnitsRequestTransferMock->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn($this->id);

        $this->companyBusinessUnitsRestApiRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitByExternalReference')
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->restCompanyBusinessUnitsRequestTransferMock->expects($this->atLeastOnce())
            ->method('getRestCompanyBusinessUnitsRequestAttributes')
            ->willReturn($this->restCompanyBusinessUnitsRequestAttributesTransferMock);

        $this->companyBusinessUnitMapperPluginInterfaceMock->expects($this->atLeastOnce())
            ->method('map')
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->companyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('update')
            ->willReturn($this->companyBusinessUnitResponseTransferMock);

        $this->companyBusinessUnitResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccessful')
            ->willReturn(false);

        $this->assertInstanceOf(
            RestCompanyBusinessUnitsResponseTransfer::class,
            $this->companyBusinessUnitWriter->update(
                $this->restCompanyBusinessUnitsRequestTransferMock
            )
        );
    }
}
