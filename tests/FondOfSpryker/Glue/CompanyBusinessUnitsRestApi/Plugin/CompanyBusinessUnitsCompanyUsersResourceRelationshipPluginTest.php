<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Plugin;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiConfig;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiFactory;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsResourceRelationshipExpanderInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class CompanyBusinessUnitsCompanyUsersResourceRelationshipPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Plugin\CompanyBusinessUnitsCompanyUsersResourceRelationshipPlugin
     */
    protected $companyBusinessUnitsCompanyUsersResourceRelationshipPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiFactory
     */
    protected $companyBusinessUnitsRestApiFactoryMock;

    /**
     * @var \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface[]
     */
    protected $resources;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface
     */
    protected $restRequestInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsResourceRelationshipExpanderInterface
     */
    protected $companyBusinessUnitsResourceRelationshipExpanderInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyBusinessUnitsRestApiFactoryMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->resources = [];

        $this->restRequestInterfaceMock = $this->getMockBuilder(RestRequestInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsResourceRelationshipExpanderInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitsResourceRelationshipExpanderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsCompanyUsersResourceRelationshipPlugin = new class (
            $this->companyBusinessUnitsRestApiFactoryMock
        ) extends CompanyBusinessUnitsCompanyUsersResourceRelationshipPlugin {
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
    public function testAddResourceRelationships(): void
    {
        $this->companyBusinessUnitsRestApiFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyBusinessUnitsResourceRelationshipExpander')
            ->willReturn($this->companyBusinessUnitsResourceRelationshipExpanderInterfaceMock);

        $this->companyBusinessUnitsResourceRelationshipExpanderInterfaceMock->expects($this->atLeastOnce())
            ->method('addResourceRelationships')
            ->with($this->resources, $this->restRequestInterfaceMock);

        $this->companyBusinessUnitsCompanyUsersResourceRelationshipPlugin->addResourceRelationships(
            $this->resources,
            $this->restRequestInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testGetRelationshipResourceType(): void
    {
        $this->assertSame(
            CompanyBusinessUnitsRestApiConfig::RESOURCE_COMPANY_BUSINESS_UNITS,
            $this->companyBusinessUnitsCompanyUsersResourceRelationshipPlugin->getRelationshipResourceType()
        );
    }
}
