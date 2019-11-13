<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business;

use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer;
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
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    public function findCompanyBusinessUnitByExternalReference(
        RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
    ): RestCompanyBusinessUnitsResponseTransfer {
        return $this->getFactory()->createCompanyBusinessUnitReader()
            ->findCompanyBusinessUnitByExternalReference($restCompanyBusinessUnitsRequestAttributesTransfer);
    }

    /**
     * Specification:
     * - Creates a company business unit
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    public function create(
        RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
    ): RestCompanyBusinessUnitsResponseTransfer {
        return $this->getFactory()->createCompanyBusinessUnitWriter()->create($restCompanyBusinessUnitsRequestAttributesTransfer);
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
     * - Updates a company business unit
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestTransfer $restCompanyBusinessUnitsRequestTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    public function update(
        RestCompanyBusinessUnitsRequestTransfer $restCompanyBusinessUnitsRequestTransfer
    ): RestCompanyBusinessUnitsResponseTransfer {
        return $this->getFactory()->createCompanyBusinessUnitWriter()->update($restCompanyBusinessUnitsRequestTransfer);
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
        return $this->getRepository()->findCompanyBusinessUnitByExternalReference($externalReference);
    }
}
