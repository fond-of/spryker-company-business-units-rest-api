<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Controller;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiFactory;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsReaderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class CompanyBusinessUnitsResourceControllerTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Controller\CompanyBusinessUnitsResourceController
     */
    protected $companyBusinessUnitsResourceController;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface
     */
    protected $restRequestInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface
     */
    protected $restResourceInterfaceMock;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiFactory
     */
    protected $companyBusinessUnitsRestApiFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsReaderInterface
     */
    protected $companyBusinessUnitsReaderInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    protected $restResponseInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->restRequestInterfaceMock = $this->getMockBuilder(RestRequestInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restResourceInterfaceMock = $this->getMockBuilder(RestResourceInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsRestApiFactoryMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsReaderInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitsReaderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restResponseInterfaceMock = $this->getMockBuilder(RestResponseInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->id = 'id';

        $this->companyBusinessUnitsResourceController = new class (
            $this->companyBusinessUnitsRestApiFactoryMock
        ) extends CompanyBusinessUnitsResourceController {
            /**
             * @var \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiFactory
             */
            protected $companyBusinessUnitsRestApiFactory;

            /**
             * @param \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiFactory $companyBusinessUnitsRestApiFactory
             */
            public function __construct(CompanyBusinessUnitsRestApiFactory $companyBusinessUnitsRestApiFactory)
            {
                $this->companyBusinessUnitsRestApiFactory = $companyBusinessUnitsRestApiFactory;
            }

            /**
             * @return \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiFactory
             */
            public function getFactory(): CompanyBusinessUnitsRestApiFactory
            {
                return $this->companyBusinessUnitsRestApiFactory;
            }
        };
    }

    /**
     * @return void
     */
    public function testGetActionByUuid(): void
    {
        $this->restRequestInterfaceMock->expects($this->atLeastOnce())
            ->method('getResource')
            ->willReturn($this->restResourceInterfaceMock);

        $this->restResourceInterfaceMock->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn($this->id);

        $this->companyBusinessUnitsRestApiFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyBusinessUnitsReader')
            ->willReturn($this->companyBusinessUnitsReaderInterfaceMock);

        $this->companyBusinessUnitsReaderInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitByUuid')
            ->with($this->restRequestInterfaceMock)
            ->willReturn($this->restResponseInterfaceMock);

        $this->assertSame(
            $this->restResponseInterfaceMock,
            $this->companyBusinessUnitsResourceController->getAction(
                $this->restRequestInterfaceMock
            )
        );
    }

    /**
     * @return void
     */
    public function testGetAction(): void
    {
        $this->restRequestInterfaceMock->expects($this->atLeastOnce())
            ->method('getResource')
            ->willReturn($this->restResourceInterfaceMock);

        $this->restResourceInterfaceMock->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn(null);

        $this->companyBusinessUnitsRestApiFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyBusinessUnitsReader')
            ->willReturn($this->companyBusinessUnitsReaderInterfaceMock);

        $this->companyBusinessUnitsReaderInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyBusinessUnitCollectionByIdCustomer')
            ->with($this->restRequestInterfaceMock)
            ->willReturn($this->restResponseInterfaceMock);

        $this->assertSame(
            $this->restResponseInterfaceMock,
            $this->companyBusinessUnitsResourceController->getAction(
                $this->restRequestInterfaceMock
            )
        );
    }
}
