<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence;

use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiPersistenceFactory getFactory()
 */
class CompanyBusinessUnitsRestApiRepository extends AbstractRepository implements CompanyBusinessUnitsRestApiRepositoryInterface
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
    public function findCompanyBusinessUnitByExternalReference(string $externalReference): ?CompanyBusinessUnitTransfer
    {
        $spyCompanyBusinessUnit = $this->getFactory()
            ->getCompanyBusinessUnitPropelQuery()
            ->filterByExternalReference($externalReference)
            ->findOne();

        if ($spyCompanyBusinessUnit === null) {
            return null;
        }

        $companyBusinessUnit = (new CompanyBusinessUnitTransfer())->fromArray(
            $spyCompanyBusinessUnit->toArray(),
            true
        );

        return $companyBusinessUnit;
    }
}
