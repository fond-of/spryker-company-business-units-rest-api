<?php

namespace FondOfSpryker\Client\CompanyBusinessUnitsRestApi;

use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer;

interface CompanyBusinessUnitsRestApiClientInterface
{
    /**
     * Specification:
     *  - Retrieve a company business unit by CompanyBusinessUnitTransfer::externalReference in the transfer
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
     *  - Create a company business unit from RestCompanyBusinessUnitsRequestAttributesTransfer
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    public function create(
        RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
    ): RestCompanyBusinessUnitsResponseTransfer;

    /**
     * Specification:
     *  - Update a company business unit from RestCompanyBusinessUnitsRequestTransfer
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestTransfer $restCompanyBusinessUnitsRequestTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    public function update(
        RestCompanyBusinessUnitsRequestTransfer $restCompanyBusinessUnitsRequestTransfer
    ): RestCompanyBusinessUnitsResponseTransfer;
}
