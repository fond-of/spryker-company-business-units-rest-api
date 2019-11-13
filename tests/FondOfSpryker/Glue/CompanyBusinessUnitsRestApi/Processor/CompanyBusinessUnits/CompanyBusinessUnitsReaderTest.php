<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits;

use Codeception\Test\Unit;
use FondOfSpryker\Client\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiClientInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiErrorInterface;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsErrorTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class CompanyBusinessUnitsReaderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsReader
     */
    protected $companyBusinessUnitsReader;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
     */
    protected $restResourceBuilderInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiClientInterface
     */
    protected $companyBusinessUnitsRestApiClientInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiErrorInterface
     */
    protected $restApiErrorInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface
     */
    protected $restRequestInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    protected $restResponseInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface
     */
    protected $restResourceInterfaceMock;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    protected $restCompanyBusinessUnitsResponseTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseAttributesTransfer
     */
    protected $restCompanyBusinessUnitsResponseAttributesTransferMock;

    /**
     * @var string
     */
    protected $externalReference;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitsErrorTransfer
     */
    protected $restCompanyBusinessUnitsErrorTransferMock;

    /**
     * @var array
     */
    protected $restCompanyBusinessUnitsErrorTransferMocks;

    /**
     * @var string
     */
    protected $errorCode;

    /**
     * @var string
     */
    protected $errorDetail;

    /**
     * @var int
     */
    protected $errorStatus;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->restResourceBuilderInterfaceMock = $this->getMockBuilder(RestResourceBuilderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsRestApiClientInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restApiErrorInterfaceMock = $this->getMockBuilder(RestApiErrorInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restRequestInterfaceMock = $this->getMockBuilder(RestRequestInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restResponseInterfaceMock = $this->getMockBuilder(RestResponseInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restResourceInterfaceMock = $this->getMockBuilder(RestResourceInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->id = 1;

        $this->restCompanyBusinessUnitsResponseTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitsResponseAttributesTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsResponseAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->externalReference = 'external-reference';

        $this->restCompanyBusinessUnitsErrorTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsErrorTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitsErrorTransferMocks = [
            $this->restCompanyBusinessUnitsErrorTransferMock,
        ];

        $this->errorCode = 'code';

        $this->errorStatus = 404;

        $this->errorDetail = 'detail';

        $this->companyBusinessUnitsReader = new CompanyBusinessUnitsReader(
            $this->restResourceBuilderInterfaceMock,
            $this->companyBusinessUnitsRestApiClientInterfaceMock,
            $this->restApiErrorInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitByExternalReference(): void
    {
        $this->restResourceBuilderInterfaceMock->expects($this->atLeastOnce())
            ->method('createRestResponse')
            ->willReturn($this->restResponseInterfaceMock);

        $this->restRequestInterfaceMock->expects($this->atLeastOnce())
            ->method('getResource')
            ->willReturn($this->restResourceInterfaceMock);

        $this->restResourceInterfaceMock->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn($this->id);

        $this->companyBusinessUnitsRestApiClientInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitByExternalReference')
            ->willReturn($this->restCompanyBusinessUnitsResponseTransferMock);

        $this->restCompanyBusinessUnitsResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccess')
            ->willReturn(true);

        $this->restCompanyBusinessUnitsResponseTransferMock->expects($this->atLeastOnce())
            ->method('getRestCompanyBusinessUnitsResponseAttributes')
            ->willReturn($this->restCompanyBusinessUnitsResponseAttributesTransferMock);

        $this->restCompanyBusinessUnitsResponseAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getExternalReference')
            ->willReturn($this->externalReference);

        $this->restResourceBuilderInterfaceMock->expects($this->atLeastOnce())
            ->method('createRestResource')
            ->willReturn($this->restResourceInterfaceMock);

        $this->restResourceBuilderInterfaceMock->expects($this->atLeastOnce())
            ->method('createRestResponse')
            ->willReturn($this->restResponseInterfaceMock);

        $this->restResponseInterfaceMock->expects($this->atLeastOnce())
            ->method('addResource')
            ->willReturn($this->restResponseInterfaceMock);

        $this->assertInstanceOf(
            RestResponseInterface::class,
            $this->companyBusinessUnitsReader->findCompanyBusinessUnitByExternalReference(
                $this->restRequestInterfaceMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitByExternalReferenceExternalReferenceMissing(): void
    {
        $this->restResourceBuilderInterfaceMock->expects($this->atLeastOnce())
            ->method('createRestResponse')
            ->willReturn($this->restResponseInterfaceMock);

        $this->restRequestInterfaceMock->expects($this->atLeastOnce())
            ->method('getResource')
            ->willReturn($this->restResourceInterfaceMock);

        $this->restResourceInterfaceMock->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn(null);

        $this->assertInstanceOf(
            RestResponseInterface::class,
            $this->companyBusinessUnitsReader->findCompanyBusinessUnitByExternalReference(
                $this->restRequestInterfaceMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitByExternalReferenceLoadCompanyBusinessUnitFailed(): void
    {
        $this->restResourceBuilderInterfaceMock->expects($this->atLeastOnce())
            ->method('createRestResponse')
            ->willReturn($this->restResponseInterfaceMock);

        $this->restRequestInterfaceMock->expects($this->atLeastOnce())
            ->method('getResource')
            ->willReturn($this->restResourceInterfaceMock);

        $this->restResourceInterfaceMock->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn($this->id);

        $this->companyBusinessUnitsRestApiClientInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitByExternalReference')
            ->willReturn($this->restCompanyBusinessUnitsResponseTransferMock);

        $this->restCompanyBusinessUnitsResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccess')
            ->willReturn(false);

        $this->restCompanyBusinessUnitsResponseTransferMock->expects($this->atLeastOnce())
            ->method('getErrors')
            ->willReturn($this->restCompanyBusinessUnitsErrorTransferMocks);

        $this->restCompanyBusinessUnitsErrorTransferMock->expects($this->atLeastOnce())
            ->method('getCode')
            ->willReturn($this->errorCode);

        $this->restCompanyBusinessUnitsErrorTransferMock->expects($this->atLeastOnce())
            ->method('getStatus')
            ->willReturn($this->errorStatus);

        $this->restCompanyBusinessUnitsErrorTransferMock->expects($this->atLeastOnce())
            ->method('getDetail')
            ->willReturn($this->errorDetail);

        $this->assertInstanceOf(
            RestResponseInterface::class,
            $this->companyBusinessUnitsReader->findCompanyBusinessUnitByExternalReference(
                $this->restRequestInterfaceMock
            )
        );
    }
}