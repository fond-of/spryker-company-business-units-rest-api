<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Communication\Plugin\CompanyBusinessUnitsRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiFacade;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiFacadeInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;

class CompanyBusinessUnitMapperPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Communication\Plugin\CompanyBusinessUnitsRestApi\CompanyBusinessUnitMapperPlugin
     */
    protected $companyBusinessUnitMapperPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiFacade
     */
    protected $companyBusinessUnitsRestApiFacadeMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer
     */
    protected $restCompanyBusinessUnitsRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    protected $companyBusinessUnitTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyBusinessUnitsRestApiFacadeMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitsRequestAttributesTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitTransferMock = $this->getMockBuilder(CompanyBusinessUnitTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitMapperPlugin = new class (
            $this->companyBusinessUnitsRestApiFacadeMock
        ) extends CompanyBusinessUnitMapperPlugin {
            /**
             * @var \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiFacadeInterface
             */
            protected $companyBusinessUnitsRestApiFacade;

            /**
             * @param \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiFacadeInterface $companyBusinessUnitsRestApiFacade
             */
            public function __construct(CompanyBusinessUnitsRestApiFacadeInterface $companyBusinessUnitsRestApiFacade)
            {
                $this->companyBusinessUnitsRestApiFacade = $companyBusinessUnitsRestApiFacade;
            }

            /**
             * @return \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiFacadeInterface
             */
            public function getFacade(): CompanyBusinessUnitsRestApiFacadeInterface
            {
                return $this->companyBusinessUnitsRestApiFacade;
            }
        };
    }

    /**
     * @return void
     */
    public function testMap(): void
    {
        $this->companyBusinessUnitsRestApiFacadeMock->expects($this->atLeastOnce())
            ->method('mapToCompanyBusinessUnit')
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->assertInstanceOf(
            CompanyBusinessUnitTransfer::class,
            $this->companyBusinessUnitMapperPlugin->map(
                $this->restCompanyBusinessUnitsRequestAttributesTransferMock,
                $this->companyBusinessUnitTransferMock
            )
        );
    }
}
