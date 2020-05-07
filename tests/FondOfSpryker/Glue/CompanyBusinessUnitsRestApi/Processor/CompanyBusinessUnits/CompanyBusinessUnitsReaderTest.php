<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits;

use ArrayObject;
use Codeception\Test\Unit;
use FondOfSpryker\Client\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiClientInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiConfig;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiErrorInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseAttributesTransfer;
use Generated\Shared\Transfer\RestUserTransfer;
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
     * @var string
     */
    protected $id;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer
     */
    protected $companyBusinessUnitResponseTransferMock;

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
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsMapperInterface
     */
    protected $companyBusinessUnitsMapperInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestUserTransfer
     */
    protected $restUserTransferMock;

    /**
     * @var int
     */
    protected $surrogateIdentifier;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer
     */
    protected $companyBusinessUnitCollectionTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    protected $companyBusinessUnitTransferMock;

    /**
     * @var \Generated\Shared\Transfer\CompanyBusinessUnitTransfer[]
     */
    protected $companyBusinessUnits;

    /**
     * @var string
     */
    protected $uuid;

    /**
     * @return void
     */
    protected function _before(): void
    {
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

        $this->id = 'c6ad97f6-8ee1-11ea-bc55-0242ac130003';

        $this->companyBusinessUnitResponseTransferMock = $this->getMockBuilder(CompanyBusinessUnitResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitsResponseAttributesTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsResponseAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->externalReference = 'external-reference';

        $this->restCompanyBusinessUnitsErrorTransferMocks = [
            $this->restCompanyBusinessUnitsErrorTransferMock,
        ];

        $this->errorCode = 'code';

        $this->errorStatus = 404;

        $this->errorDetail = 'detail';

        $this->companyBusinessUnitsMapperInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitsMapperInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restUserTransferMock = $this->getMockBuilder(RestUserTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->surrogateIdentifier = 1;

        $this->companyBusinessUnitCollectionTransferMock = $this->getMockBuilder(CompanyBusinessUnitCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitTransferMock = $this->getMockBuilder(CompanyBusinessUnitTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnits = new ArrayObject([
            $this->companyBusinessUnitTransferMock,
        ]);

        $this->uuid = 'uuid';

        $this->companyBusinessUnitsReader = new CompanyBusinessUnitsReader(
            $this->restResourceBuilderInterfaceMock,
            $this->companyBusinessUnitsRestApiClientInterfaceMock,
            $this->companyBusinessUnitsMapperInterfaceMock,
            $this->restApiErrorInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitCollectionByIdCustomer(): void
    {
        $this->restResourceBuilderInterfaceMock->expects($this->atLeastOnce())
            ->method('createRestResponse')
            ->willReturn($this->restResponseInterfaceMock);

        $this->restRequestInterfaceMock->expects($this->atLeastOnce())
            ->method('getRestUser')
            ->willReturn($this->restUserTransferMock);

        $this->restUserTransferMock->expects($this->atLeastOnce())
            ->method('getSurrogateIdentifier')
            ->willReturn($this->surrogateIdentifier);

        $this->companyBusinessUnitsRestApiClientInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitCollectionByIdCustomer')
            ->willReturn($this->companyBusinessUnitCollectionTransferMock);

        $this->companyBusinessUnitCollectionTransferMock->expects($this->atLeastOnce())
            ->method('getCompanyBusinessUnits')
            ->willReturn($this->companyBusinessUnits);

        $this->companyBusinessUnitsMapperInterfaceMock->expects($this->atLeastOnce())
            ->method('mapCompanyBusinessUnitTransferToRestCompanyBusinessUnitsResponseAttributesTransfer')
            ->with($this->companyBusinessUnitTransferMock)
            ->willReturn($this->restCompanyBusinessUnitsResponseAttributesTransferMock);

        $this->restCompanyBusinessUnitsResponseAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getUuid')
            ->willReturn($this->uuid);

        $this->restResourceBuilderInterfaceMock->expects($this->atLeastOnce())
            ->method('createRestResource')
            ->with(
                CompanyBusinessUnitsRestApiConfig::RESOURCE_COMPANY_BUSINESS_UNITS,
                $this->uuid,
                $this->restCompanyBusinessUnitsResponseAttributesTransferMock
            )->willReturn($this->restResourceInterfaceMock);

        $this->restResponseInterfaceMock->expects($this->atLeastOnce())
            ->method('addResource')
            ->with($this->restResourceInterfaceMock)
            ->willReturnSelf();

        $this->assertInstanceOf(
            RestResponseInterface::class,
            $this->companyBusinessUnitsReader->findCompanyBusinessUnitCollectionByIdCustomer(
                $this->restRequestInterfaceMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitByUuid(): void
    {
        $this->restResourceBuilderInterfaceMock->expects($this->atLeastOnce())
            ->method('createRestResponse')
            ->willReturn($this->restResponseInterfaceMock);

        $this->restRequestInterfaceMock->expects($this->atLeastOnce())
            ->method('getResource')
            ->willReturn($this->restResourceInterfaceMock);

        $this->restResourceInterfaceMock->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn($this->uuid);

        $this->companyBusinessUnitsRestApiClientInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitByUuid')
            ->willReturn($this->companyBusinessUnitResponseTransferMock);

        $this->companyBusinessUnitResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccessful')
            ->willReturn(true);

        $this->restRequestInterfaceMock->expects($this->atLeastOnce())
            ->method('getRestUser')
            ->willReturn($this->restUserTransferMock);

        $this->restUserTransferMock->expects($this->atLeastOnce())
            ->method('getSurrogateIdentifier')
            ->willReturn($this->surrogateIdentifier);

        $this->companyBusinessUnitsRestApiClientInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitCollectionByIdCustomer')
            ->willReturn($this->companyBusinessUnitCollectionTransferMock);

        $this->companyBusinessUnitCollectionTransferMock->expects($this->atLeastOnce())
            ->method('getCompanyBusinessUnits')
            ->willReturn($this->companyBusinessUnits);

        $this->companyBusinessUnitTransferMock->expects($this->atLeastOnce())
            ->method('getUuid')
            ->willReturn($this->uuid);

        $this->companyBusinessUnitResponseTransferMock->expects($this->atLeastOnce())
            ->method('getCompanyBusinessUnitTransfer')
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->companyBusinessUnitsMapperInterfaceMock->expects($this->atLeastOnce())
            ->method('mapCompanyBusinessUnitTransferToRestCompanyBusinessUnitsResponseAttributesTransfer')
            ->with($this->companyBusinessUnitTransferMock)
            ->willReturn($this->restCompanyBusinessUnitsResponseAttributesTransferMock);

        $this->restCompanyBusinessUnitsResponseAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getUuid')
            ->willReturn($this->uuid);

        $this->restResourceBuilderInterfaceMock->expects($this->atLeastOnce())
            ->method('createRestResource')
            ->with(
                CompanyBusinessUnitsRestApiConfig::RESOURCE_COMPANY_BUSINESS_UNITS,
                $this->uuid,
                $this->restCompanyBusinessUnitsResponseAttributesTransferMock
            )->willReturn($this->restResourceInterfaceMock);

        $this->restResponseInterfaceMock->expects($this->atLeastOnce())
            ->method('addResource')
            ->with($this->restResourceInterfaceMock)
            ->willReturnSelf();

        $this->assertInstanceOf(
            RestResponseInterface::class,
            $this->companyBusinessUnitsReader->findCompanyBusinessUnitByUuid(
                $this->restRequestInterfaceMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitByUuidUuidMissing(): void
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

        $this->restApiErrorInterfaceMock->expects($this->atLeastOnce())
            ->method('addUuidMissingError')
            ->with($this->restResponseInterfaceMock)
            ->willReturn($this->restResponseInterfaceMock);

        $this->assertInstanceOf(
            RestResponseInterface::class,
            $this->companyBusinessUnitsReader->findCompanyBusinessUnitByUuid(
                $this->restRequestInterfaceMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitByUuidCompanyBusinessUnitNotFound(): void
    {
        $this->restResourceBuilderInterfaceMock->expects($this->atLeastOnce())
            ->method('createRestResponse')
            ->willReturn($this->restResponseInterfaceMock);

        $this->restRequestInterfaceMock->expects($this->atLeastOnce())
            ->method('getResource')
            ->willReturn($this->restResourceInterfaceMock);

        $this->restResourceInterfaceMock->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn($this->uuid);

        $this->companyBusinessUnitsRestApiClientInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitByUuid')
            ->willReturn($this->companyBusinessUnitResponseTransferMock);

        $this->companyBusinessUnitResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccessful')
            ->willReturn(false);

        $this->restApiErrorInterfaceMock->expects($this->atLeastOnce())
            ->method('addCompanyBusinessUnitNotFoundError')
            ->with($this->restResponseInterfaceMock)
            ->willReturn($this->restResponseInterfaceMock);

        $this->assertInstanceOf(
            RestResponseInterface::class,
            $this->companyBusinessUnitsReader->findCompanyBusinessUnitByUuid(
                $this->restRequestInterfaceMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyBusinessUnitByUuidCompanyBusinessUnitNoPermission(): void
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
            ->method('findCompanyBusinessUnitByUuid')
            ->willReturn($this->companyBusinessUnitResponseTransferMock);

        $this->companyBusinessUnitResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccessful')
            ->willReturn(true);

        $this->restRequestInterfaceMock->expects($this->atLeastOnce())
            ->method('getRestUser')
            ->willReturn($this->restUserTransferMock);

        $this->restUserTransferMock->expects($this->atLeastOnce())
            ->method('getSurrogateIdentifier')
            ->willReturn($this->surrogateIdentifier);

        $this->companyBusinessUnitsRestApiClientInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitCollectionByIdCustomer')
            ->willReturn($this->companyBusinessUnitCollectionTransferMock);

        $this->companyBusinessUnitCollectionTransferMock->expects($this->atLeastOnce())
            ->method('getCompanyBusinessUnits')
            ->willReturn($this->companyBusinessUnits);

        $this->companyBusinessUnitTransferMock->expects($this->atLeastOnce())
            ->method('getUuid')
            ->willReturn($this->uuid);

        $this->restApiErrorInterfaceMock->expects($this->atLeastOnce())
            ->method('addCompanyBusinessUnitNoPermissionError')
            ->with($this->restResponseInterfaceMock)
            ->willReturn($this->restResponseInterfaceMock);

        $this->assertInstanceOf(
            RestResponseInterface::class,
            $this->companyBusinessUnitsReader->findCompanyBusinessUnitByUuid(
                $this->restRequestInterfaceMock
            )
        );
    }
}
