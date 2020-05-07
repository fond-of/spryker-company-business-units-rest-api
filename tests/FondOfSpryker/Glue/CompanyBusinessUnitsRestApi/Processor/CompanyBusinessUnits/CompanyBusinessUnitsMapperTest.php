<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseAttributesTransfer;

class CompanyBusinessUnitsMapperTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsMapper
     */
    protected $companyBusinessUnitsMapper;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    protected $companyBusinessUnitTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseAttributesTransfer
     */
    protected $restCompanyBusinessUnitsResponseAttributesTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->companyBusinessUnitTransferMock = $this->getMockBuilder(CompanyBusinessUnitTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitsResponseAttributesTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsResponseAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsMapper = new CompanyBusinessUnitsMapper();
    }

    /**
     * @return void
     */
    public function testMapCompanyBusinessUnitTransferToRestCompanyBusinessUnitsResponseAttributesTransfer(): void
    {
        $this->companyBusinessUnitTransferMock->expects($this->atLeastOnce())
            ->method('toArray')
            ->willReturn([]);

        $this->restCompanyBusinessUnitsResponseAttributesTransferMock->expects($this->atLeastOnce())
            ->method('fromArray')
            ->willReturn($this->restCompanyBusinessUnitsResponseAttributesTransferMock);

        $this->assertSame(
            $this->restCompanyBusinessUnitsResponseAttributesTransferMock,
            $this->companyBusinessUnitsMapper->mapCompanyBusinessUnitTransferToRestCompanyBusinessUnitsResponseAttributesTransfer(
                $this->companyBusinessUnitTransferMock,
                $this->restCompanyBusinessUnitsResponseAttributesTransferMock
            )
        );
    }
}
