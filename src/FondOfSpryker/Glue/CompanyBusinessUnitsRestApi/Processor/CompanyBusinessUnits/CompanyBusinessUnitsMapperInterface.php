<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits;

use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseAttributesTransfer;

interface CompanyBusinessUnitsMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseAttributesTransfer $restCompanyBusinessUnitsResponseAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseAttributesTransfer
     */
    public function mapCompanyBusinessUnitTransferToRestCompanyBusinessUnitsResponseAttributesTransfer(
        CompanyBusinessUnitTransfer $companyBusinessUnitTransfer,
        RestCompanyBusinessUnitsResponseAttributesTransfer $restCompanyBusinessUnitsResponseAttributesTransfer
    ): RestCompanyBusinessUnitsResponseAttributesTransfer;
}
