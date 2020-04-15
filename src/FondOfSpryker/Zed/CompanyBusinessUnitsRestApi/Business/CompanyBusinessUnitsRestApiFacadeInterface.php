<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business;

use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer;

interface CompanyBusinessUnitsRestApiFacadeInterface
{
    /**
     * Specification:
     * - Retrieves company business unit information by external reference.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    public function findCompanyBusinessUnitByExternalReference(
        RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
    ): RestCompanyBusinessUnitsResponseTransfer;

    /**
     * Specification:
     * - Retrieves company business unit information by uuid.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer
     */
    public function findCompanyBusinessUnitByUuid(
        CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
    ): CompanyBusinessUnitResponseTransfer;

    /**
     * Specification:
     * - Retrieves company business unit collection information by id customer.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer
     */
    public function findCompanyBusinessUnitCollectionByIdCustomer(
        CustomerTransfer $customerTransfer
    ): CompanyBusinessUnitCollectionTransfer;

    /**
     * Specification:
     * - Map to company business unit transfer
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    public function mapToCompanyBusinessUnit(
        RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer,
        CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
    ): CompanyBusinessUnitTransfer;
}
