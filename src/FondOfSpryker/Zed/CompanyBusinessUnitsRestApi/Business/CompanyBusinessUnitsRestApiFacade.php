<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business;

use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiBusinessFactory getFactory()
 * @method \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepositoryInterface getRepository()
 */
class CompanyBusinessUnitsRestApiFacade extends AbstractFacade implements CompanyBusinessUnitsRestApiFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer
     */
    public function findCompanyBusinessUnitByUuid(
        CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
    ): CompanyBusinessUnitResponseTransfer {
        return $this->getFactory()->createCompanyBusinessUnitReader()
            ->findCompanyBusinessUnitByUuid($companyBusinessUnitTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer
     */
    public function findCompanyBusinessUnitCollectionByIdCustomer(
        CustomerTransfer $customerTransfer
    ): CompanyBusinessUnitCollectionTransfer {
        return $this->getFactory()->createCompanyBusinessUnitReader()
            ->findCompanyBusinessUnitCollectionByIdCustomer($customerTransfer);
    }
}
