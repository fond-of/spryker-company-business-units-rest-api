<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\Mapper;

use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\SpyCompanyBusinessUnitEntityTransfer;

interface CompanyBusinessUnitMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\SpyCompanyBusinessUnitEntityTransfer[] $spyCompanyBusinessUnitEntityTransfers
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer $companyBusinessUnitCollectionTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer
     */
    public function mapEntityTransfersToTransfer(
        array $spyCompanyBusinessUnitEntityTransfers,
        CompanyBusinessUnitCollectionTransfer $companyBusinessUnitCollectionTransfer
    ): CompanyBusinessUnitCollectionTransfer;

    /**
     * @param \Generated\Shared\Transfer\SpyCompanyBusinessUnitEntityTransfer $spyCompanyBusinessUnitEntityTransfer
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    public function mapEntityTransferToTransfer(
        SpyCompanyBusinessUnitEntityTransfer $spyCompanyBusinessUnitEntityTransfer,
        CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
    ): CompanyBusinessUnitTransfer;
}
