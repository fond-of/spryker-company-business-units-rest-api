<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit;

use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer;

interface CompanyBusinessUnitReaderInterface
{
    /**
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    public function findCompanyBusinessUnitByExternalReference(
        RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
    ): RestCompanyBusinessUnitsResponseTransfer;
}
