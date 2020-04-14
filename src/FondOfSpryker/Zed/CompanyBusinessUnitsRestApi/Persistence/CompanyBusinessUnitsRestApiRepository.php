<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence;

use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
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
     * @param string $companyBusinessUnitUuid
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitTransfer|null
     */
    public function findCompanyBusinessUnitByUuid(string $companyBusinessUnitUuid): ?CompanyBusinessUnitTransfer
    {
        $spyCompanyBusinessUnit = $this->getFactory()
            ->getCompanyBusinessUnitPropelQuery()
            ->filterByUuid($companyBusinessUnitUuid)
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

    /**
     * Specification:
     *  - Retrieve company business units by id customer
     *
     * @api
     *
     * @param string $idCustomer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer
     */
    public function findCompanyBusinessUnitCollectionByIdCustomer(string $idCustomer): CompanyBusinessUnitCollectionTransfer
    {
        $spyCompanyBusinessUnit = $this->getFactory()
            ->getCompanyBusinessUnitPropelQuery()
            ->joinWithCompany()
                ->useCompanyQuery()
                ->joinWithCompanyUser()
                    ->useCompanyUserQuery()
                    ->filterByIsActive(true)
                    ->joinWithCustomer()
                        ->useCustomerQuery()
                        ->filterByIdCustomer($idCustomer)
                    ->endUse()
                ->endUse()
            ->endUse();

        $spyCompanyBusinessUnitEntityTransfers = $this->buildQueryFromCriteria($spyCompanyBusinessUnit)->find();

        return $this->getFactory()
            ->createCompanyBusinessUnitMapper()
            ->mapEntityTransfersToTransfer(
                $spyCompanyBusinessUnitEntityTransfers,
                new CompanyBusinessUnitCollectionTransfer()
            );
    }
}
