<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;

class CompanyBusinessUnitMapperTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitMapper
     */
    protected $companyBusinessUnitMapper;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer
     */
    protected $restCompanyBusinessUnitsRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    protected $companyBusinessUnitTransferMock;

    /**
     * @var string
     */
    protected $companyBusinessUnitExternalReference;

    /**
     * @var string
     */
    protected $companyBusinessUnitEmail;

    /**
     * @var string
     */
    protected $companyBusinessUnitName;

    /**
     * @var string
     */
    protected $companyBusinessUnitPhone;

    /**
     * @var string
     */
    protected $companyBusinessUnitIban;

    /**
     * @var string
     */
    protected $companyBusinessUnitBic;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->restCompanyBusinessUnitsRequestAttributesTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitsRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitTransferMock = $this->getMockBuilder(CompanyBusinessUnitTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitExternalReference = 'external-reference';

        $this->companyBusinessUnitEmail = 'email';

        $this->companyBusinessUnitName = 'name';

        $this->companyBusinessUnitPhone = 'phone';

        $this->companyBusinessUnitIban = 'iban';

        $this->companyBusinessUnitBic = 'bic';

        $this->companyBusinessUnitMapper = new CompanyBusinessUnitMapper();
    }

    /**
     * @return void
     */
    public function testMapToCompanyBusinessUnit(): void
    {
        $this->restCompanyBusinessUnitsRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getExternalReference')
            ->willReturn($this->companyBusinessUnitExternalReference);

        $this->restCompanyBusinessUnitsRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getEmail')
            ->willReturn($this->companyBusinessUnitEmail);

        $this->restCompanyBusinessUnitsRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getName')
            ->willReturn($this->companyBusinessUnitName);

        $this->restCompanyBusinessUnitsRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getPhone')
            ->willReturn($this->companyBusinessUnitPhone);

        $this->restCompanyBusinessUnitsRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getIban')
            ->willReturn($this->companyBusinessUnitIban);

        $this->restCompanyBusinessUnitsRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getBic')
            ->willReturn($this->companyBusinessUnitBic);

        $this->assertInstanceOf(
            CompanyBusinessUnitTransfer::class,
            $this->companyBusinessUnitMapper->mapToCompanyBusinessUnit(
                $this->restCompanyBusinessUnitsRequestAttributesTransferMock,
                $this->companyBusinessUnitTransferMock
            )
        );
    }
}
