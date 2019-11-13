<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi;

use Codeception\Test\Unit;
use Spryker\Zed\Kernel\Container;

class CompanyBusinessUnitsRestApiDependencyProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiDependencyProvider
     */
    protected $companyBusinessUnitsRestApiDependencyProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsRestApiDependencyProvider = new CompanyBusinessUnitsRestApiDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideBusinessLayerDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->companyBusinessUnitsRestApiDependencyProvider->provideBusinessLayerDependencies(
                $this->containerMock
            )
        );
    }

    /**
     * @return void
     */
    public function testProvidePersistenceLayerDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->companyBusinessUnitsRestApiDependencyProvider->providePersistenceLayerDependencies(
                $this->containerMock
            )
        );
    }
}
