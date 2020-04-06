<?php

namespace FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Zed;

use Codeception\Test\Unit;
use FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Dependency\Client\CompanyBusinessUnitsRestApiToZedRequestClientInterface;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer;

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
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer
     */
    protected $restCompanyBusinessUnitsRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    protected $restCompanyBusinessUnitsResponseTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestTransfer
     */
    protected $restCompanyBusinessUnitsRequestTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->zedRequestClientMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiToZedRequestClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitsRequestAttributesTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitsResponseTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitsRequestTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsRequestTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsRestApiStub = new CompanyBusinessUnitsRestApiStub(
            $this->zedRequestClientMock
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitByExternalReference(): void
    {
        $this->zedRequestClientMock->expects($this->atLeastOnce())
            ->method('call')
            ->willReturn($this->restCompanyBusinessUnitsResponseTransferMock);

        $this->assertInstanceOf(
            RestCompanyBusinessUnitsResponseTransfer::class,
            $this->companyBusinessUnitsRestApiStub->findCompanyBusinessUnitByExternalReference(
                $this->restCompanyBusinessUnitsRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testCreate(): void
    {
        $this->zedRequestClientMock->expects($this->atLeastOnce())
            ->method('call')
            ->willReturn($this->restCompanyBusinessUnitsResponseTransferMock);

        $this->assertInstanceOf(
            RestCompanyBusinessUnitsResponseTransfer::class,
            $this->companyBusinessUnitsRestApiStub->create(
                $this->restCompanyBusinessUnitsRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testUpdate(): void
    {
        $this->zedRequestClientMock->expects($this->atLeastOnce())
            ->method('call')
            ->willReturn($this->restCompanyBusinessUnitsResponseTransferMock);

        $this->assertInstanceOf(
            RestCompanyBusinessUnitsResponseTransfer::class,
            $this->companyBusinessUnitsRestApiStub->update(
                $this->restCompanyBusinessUnitsRequestTransferMock
            )
        );
    }
}
