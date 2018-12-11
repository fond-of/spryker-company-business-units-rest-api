<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence;

use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;

interface CompanyBusinessUnitsRestApiRepositoryInterface
{
    /**
     * Specification:
     *  - Retrieve a company business unit by externalReference
     *
     * @api
     *
     * @param string $externalReference
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitTransfer|null
     */
    public function findCompanyBusinessUnitByExternalReference(string $externalReference): ?CompanyBusinessUnitTransfer;
}
