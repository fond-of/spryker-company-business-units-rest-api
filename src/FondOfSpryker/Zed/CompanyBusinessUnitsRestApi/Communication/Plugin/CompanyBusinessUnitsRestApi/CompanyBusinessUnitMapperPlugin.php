<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Communication\Plugin\CompanyBusinessUnitsRestApi;

use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Dependency\Plugin\CompanyBusinessUnitMapperPluginInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiFacadeInterface getFacade()
 */
class CompanyBusinessUnitMapperPlugin extends AbstractPlugin implements CompanyBusinessUnitMapperPluginInterface
{
    /**
     * Specification:
     * - Maps rest company business unit request data to company business unit transfer.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    public function map(
        RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer,
        CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
    ): CompanyBusinessUnitTransfer {
        return $this->getFacade()->mapToCompanyBusinessUnit($restCompanyBusinessUnitsRequestAttributesTransfer, $companyBusinessUnitTransfer);
    }
}
