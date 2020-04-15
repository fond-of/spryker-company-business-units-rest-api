<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit;

use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
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

    /**
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer
     */
    public function findCompanyBusinessUnitByUuid(
        CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
    ): CompanyBusinessUnitResponseTransfer;

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer
     */
    public function findCompanyBusinessUnitCollectionByIdCustomer(
        CustomerTransfer $customerTransfer
    ): CompanyBusinessUnitCollectionTransfer;
}
