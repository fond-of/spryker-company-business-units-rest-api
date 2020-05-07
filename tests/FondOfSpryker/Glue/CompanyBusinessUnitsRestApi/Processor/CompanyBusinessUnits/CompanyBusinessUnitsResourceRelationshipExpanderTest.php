<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CompanyUserTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseAttributesTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class CompanyBusinessUnitsResourceRelationshipExpanderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsResourceRelationshipExpander
     */
    protected $companyBusinessUnitsResourceRelationshipExpander;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
     */
    protected $restResourceBuilderInterface;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsMapperInterface
     */
    protected $companyBusinessUnitsMapperInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsMapperInterface
     */
    protected $restResourceInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface
     */
    protected $restRequestInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyUserTransfer
     */
    protected $companyUserTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    protected $companyBusinessUnitTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseAttributesTransfer
     */
    protected $restCompanyBusinessUnitsResponseAttributesTransferMock;

    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var array
     */
    protected $resources;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->restResourceBuilderInterface = $this->getMockBuilder(RestResourceBuilderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsMapperInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitsMapperInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restResourceInterfaceMock = $this->getMockBuilder(RestResourceInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restRequestInterfaceMock = $this->getMockBuilder(RestRequestInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUserTransferMock = $this->getMockBuilder(CompanyUserTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitTransferMock = $this->getMockBuilder(CompanyBusinessUnitTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitsResponseAttributesTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsResponseAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->uuid = 'uuid';

        $this->resources = [
            $this->restResourceInterfaceMock,
        ];

        $this->companyBusinessUnitsResourceRelationshipExpander = new CompanyBusinessUnitsResourceRelationshipExpander(
            $this->restResourceBuilderInterface,
            $this->companyBusinessUnitsMapperInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testAddResourceRelationships(): void
    {
        $this->restResourceInterfaceMock->expects($this->atLeastOnce())
            ->method('getPayload')
            ->willReturn($this->companyUserTransferMock);

        $this->companyUserTransferMock->expects($this->atLeastOnce())
            ->method('getCompanyBusinessUnit')
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->companyBusinessUnitsMapperInterfaceMock->expects($this->atLeastOnce())
            ->method('mapCompanyBusinessUnitTransferToRestCompanyBusinessUnitsResponseAttributesTransfer')
            ->willReturn($this->restCompanyBusinessUnitsResponseAttributesTransferMock);

        $this->companyBusinessUnitTransferMock->expects($this->atLeastOnce())
            ->method('getUuid')
            ->willReturn($this->uuid);

        $this->restResourceBuilderInterface->expects($this->atLeastOnce())
            ->method('createRestResource')
            ->willReturn($this->restResourceInterfaceMock);

        $this->assertIsArray(
            $this->companyBusinessUnitsResourceRelationshipExpander->addResourceRelationships(
                $this->resources,
                $this->restRequestInterfaceMock
            )
        );
    }

    /**
     * @return void
     */
    public function testAddResourceRelationshipsPayloadNull(): void
    {
        $this->restResourceInterfaceMock->expects($this->atLeastOnce())
            ->method('getPayload')
            ->willReturn(null);

        $this->assertIsArray(
            $this->companyBusinessUnitsResourceRelationshipExpander->addResourceRelationships(
                $this->resources,
                $this->restRequestInterfaceMock
            )
        );
    }

    /**
     * @return void
     */
    public function testAddResourceRelationshipsCompanyBusinessUnitTransferNull(): void
    {
        $this->restResourceInterfaceMock->expects($this->atLeastOnce())
            ->method('getPayload')
            ->willReturn($this->companyUserTransferMock);

        $this->companyUserTransferMock->expects($this->atLeastOnce())
            ->method('getCompanyBusinessUnit')
            ->willReturn(null);

        $this->assertIsArray(
            $this->companyBusinessUnitsResourceRelationshipExpander->addResourceRelationships(
                $this->resources,
                $this->restRequestInterfaceMock
            )
        );
    }
}
