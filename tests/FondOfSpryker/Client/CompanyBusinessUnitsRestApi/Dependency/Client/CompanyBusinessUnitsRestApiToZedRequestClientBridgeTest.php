<?php

namespace FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Dependency\Client;

use Codeception\Test\Unit;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;
use Spryker\Shared\Kernel\Transfer\TransferInterface;

class CompanyBusinessUnitsRestApiToZedRequestClientBridgeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Dependency\Client\CompanyBusinessUnitsRestApiToZedRequestClientBridge
     */
    protected $companyBusinessUnitsRestApiToZedRequestClientBridge;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Client\ZedRequest\ZedRequestClientInterface
     */
    protected $zedRequestClientInterfaceMock;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Shared\Kernel\Transfer\TransferInterface
     */
    protected $transferInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->zedRequestClientInterfaceMock = $this->getMockBuilder(ZedRequestClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->url = 'url';

        $this->transferInterfaceMock = $this->getMockBuilder(TransferInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsRestApiToZedRequestClientBridge = new CompanyBusinessUnitsRestApiToZedRequestClientBridge(
            $this->zedRequestClientInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testCall(): void
    {
        $this->zedRequestClientInterfaceMock->expects($this->atLeastOnce())
            ->method('call')
            ->willReturn($this->transferInterfaceMock);

        $this->assertInstanceOf(
            TransferInterface::class,
            $this->companyBusinessUnitsRestApiToZedRequestClientBridge->call(
                $this->url,
                $this->transferInterfaceMock
            )
        );
    }
}
