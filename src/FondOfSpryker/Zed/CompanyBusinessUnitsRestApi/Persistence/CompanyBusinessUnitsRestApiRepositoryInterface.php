<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence;

use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;

interface CompanyBusinessUnitsRestApiRepositoryInterface
{
    /**
     * Specification:
     *  - Retrieve a company business unit by CompanyBusinessUnitTransfer::externalReference in the transfer
     *
     * @api
     *
     * @param string $externalReference
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitTransfer|null
     */
    public function findCompanyBusinessUnitByExternalReference(string $externalReference): ?CompanyBusinessUnitTransfer;

    /**
     * Specification:
     * - Retrieve a company business unit by uuid
     *
     * @api
     *
     * @param string $companyBusinessUnitUuid
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitTransfer|null
     */
    public function findCompanyBusinessUnitByUuid(string $companyBusinessUnitUuid): ?CompanyBusinessUnitTransfer;

    /**
     * Specification:
     * - Retrieve company business unit collection by id customer
     *
     * @api
     *
     * @param string $idCustomer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer
     */
    public function findCompanyBusinessUnitCollectionByIdCustomer(string $idCustomer): CompanyBusinessUnitCollectionTransfer;
}
