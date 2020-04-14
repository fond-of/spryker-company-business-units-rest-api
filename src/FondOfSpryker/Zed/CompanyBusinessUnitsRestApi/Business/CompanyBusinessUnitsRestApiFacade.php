<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business;

use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiBusinessFactory getFactory()
 * @method \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepositoryInterface getRepository()
 */
class CompanyBusinessUnitsRestApiFacade extends AbstractFacade implements CompanyBusinessUnitsRestApiFacadeInterface
{
    /**
     * @inheritdoc
     *
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer $companyBusinessUnitTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer
     *
     * @api
     */
    public function findCompanyBusinessUnitByUuid(
        CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
    ): CompanyBusinessUnitResponseTransfer {
        return $this->getFactory()->createCompanyBusinessUnitReader()
            ->findCompanyBusinessUnitByUuid($companyBusinessUnitTransfer);
    }

    /**
     * @inheritdoc
     *
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer $companyBusinessUnitTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     *
     * @api
     */
    public function findCompanyBusinessUnitCollectionByIdCustomer(
        CustomerTransfer $customerTransfer
    ): CompanyBusinessUnitCollectionTransfer {
        return $this->getFactory()->createCompanyBusinessUnitReader()
            ->findCompanyBusinessUnitCollectionByIdCustomer($customerTransfer);
    }

    /**
     * Specification:
     * - Map to company business unit transfer
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    public function mapToCompanyBusinessUnit(
        RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer,
        CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
    ): CompanyBusinessUnitTransfer {
        return $this->getFactory()->createCompanyBusinessUnitMapper()->mapToCompanyBusinessUnit(
            $restCompanyBusinessUnitsRequestAttributesTransfer,
            $companyBusinessUnitTransfer
        );
    }

    /**
     * Specification:
     * - Retrieves company business unit information by external reference.
     *
     * @api
     *
     * @param string $externalReference
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitTransfer|null
     */
    public function findByExternalReference(string $externalReference): ?CompanyBusinessUnitTransfer
    {
        return $this->getRepository()->findCompanyBusinessUnitByUuid($externalReference);
    }
}
