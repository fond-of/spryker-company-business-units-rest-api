<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit;

use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;

class CompanyBusinessUnitMapper implements CompanyBusinessUnitMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    public function mapToCompanyBusinessUnit(
        RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer,
        CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
    ): CompanyBusinessUnitTransfer {
        if ($restCompanyBusinessUnitsRequestAttributesTransfer->getExternalReference() !== null) {
            $companyBusinessUnitTransfer->setExternalReference(
                $restCompanyBusinessUnitsRequestAttributesTransfer->getExternalReference()
            );
        }

        if ($restCompanyBusinessUnitsRequestAttributesTransfer->getEmail() !== null) {
            $companyBusinessUnitTransfer->setEmail($restCompanyBusinessUnitsRequestAttributesTransfer->getEmail());
        }

        if ($restCompanyBusinessUnitsRequestAttributesTransfer->getName() !== null) {
            $companyBusinessUnitTransfer->setName($restCompanyBusinessUnitsRequestAttributesTransfer->getName());
        }

        if ($restCompanyBusinessUnitsRequestAttributesTransfer->getPhone() !== null) {
            $companyBusinessUnitTransfer->setPhone($restCompanyBusinessUnitsRequestAttributesTransfer->getPhone());
        }

        if ($restCompanyBusinessUnitsRequestAttributesTransfer->getIban() !== null) {
            $companyBusinessUnitTransfer->setIban($restCompanyBusinessUnitsRequestAttributesTransfer->getIban());
        }

        if ($restCompanyBusinessUnitsRequestAttributesTransfer->getBic() !== null) {
            $companyBusinessUnitTransfer->setBic($restCompanyBusinessUnitsRequestAttributesTransfer->getBic());
        }

        return $companyBusinessUnitTransfer;
    }
}
