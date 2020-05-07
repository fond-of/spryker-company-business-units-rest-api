<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Plugin;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiConfig;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface;

class CompanyBusinessUnitsResourceRoutePluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Plugin\CompanyBusinessUnitsResourceRoutePlugin
     */
    protected $companyBusinessUnitsResourceRoutePlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface
     */
    protected $resourceRouteCollectionInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->resourceRouteCollectionInterfaceMock = $this->getMockBuilder(ResourceRouteCollectionInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsResourceRoutePlugin = new CompanyBusinessUnitsResourceRoutePlugin();
    }

    /**
     * @return void
     */
    public function testConfigure(): void
    {
        $this->resourceRouteCollectionInterfaceMock->expects($this->atLeastOnce())
            ->method('addGet')
            ->willReturn($this->resourceRouteCollectionInterfaceMock);

        $this->assertSame(
            $this->resourceRouteCollectionInterfaceMock,
            $this->companyBusinessUnitsResourceRoutePlugin->configure(
                $this->resourceRouteCollectionInterfaceMock
            )
        );
    }

    /**
     * @return void
     */
    public function testGetResourceType(): void
    {
        $this->assertSame(
            CompanyBusinessUnitsRestApiConfig::RESOURCE_COMPANY_BUSINESS_UNITS,
            $this->companyBusinessUnitsResourceRoutePlugin->getResourceType()
        );
    }

    /**
     * @return void
     */
    public function testGetController(): void
    {
        $this->assertSame(
            CompanyBusinessUnitsRestApiConfig::CONTROLLER_COMPANY_BUSINESS_UNITS,
            $this->companyBusinessUnitsResourceRoutePlugin->getController()
        );
    }

    /**
     * @return void
     */
    public function testGetResourceAttributesClassName(): void
    {
        $this->assertSame(
            RestCompanyBusinessUnitsRequestAttributesTransfer::class,
            $this->companyBusinessUnitsResourceRoutePlugin->getResourceAttributesClassName()
        );
    }
}
