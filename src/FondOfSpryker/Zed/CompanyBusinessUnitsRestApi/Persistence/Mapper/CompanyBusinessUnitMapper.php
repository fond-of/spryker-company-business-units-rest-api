<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\Mapper;

use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\SpyCompanyBusinessUnitEntityTransfer;

class CompanyBusinessUnitMapper implements CompanyBusinessUnitMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\SpyCompanyRoleEntityTransfer[] $spyCompanyRoleEntityTransfers
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer $companyBusinessUnitCollectionTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer
     */
    public function mapEntityTransfersToTransfer(
        array $spyCompanyRoleEntityTransfers,
        CompanyBusinessUnitCollectionTransfer $companyBusinessUnitCollectionTransfer
    ): CompanyBusinessUnitCollectionTransfer {
        foreach ($spyCompanyRoleEntityTransfers as $spyCompanyRoleEntityTransfer) {
            $companyBusinessUnitTransfer = new CompanyBusinessUnitTransfer();
            $companyBusinessUnitTransfer = $this->mapEntityTransferToTransfer($spyCompanyRoleEntityTransfer, $companyBusinessUnitTransfer);

            $companyBusinessUnitCollectionTransfer->addCompanyBusinessUnit($companyBusinessUnitTransfer);
        }

        return $companyBusinessUnitCollectionTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\SpyCompanyBusinessUnitEntityTransfer $spyCompanyBusinessUnitEntityTransfer
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    public function mapEntityTransferToTransfer(
        SpyCompanyBusinessUnitEntityTransfer $spyCompanyBusinessUnitEntityTransfer,
        CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
    ): CompanyBusinessUnitTransfer {
        return $companyBusinessUnitTransfer->fromArray($spyCompanyBusinessUnitEntityTransfer->toArray(), true);
    }
}
