<?php

namespace FondOfSpryker\Client\CompanyBusinessUnitsRestApi;

use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \FondOfSpryker\Client\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiFactory getFactory()
 */
class CompanyBusinessUnitsRestApiClient extends AbstractClient implements CompanyBusinessUnitsRestApiClientInterface
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
        return $this->getFactory()
            ->createZedCompanyBusinessUnitsRestApiStub()
            ->findCompanyBusinessUnitByExternalReference($restCompanyBusinessUnitsRequestAttributesTransfer);
    }

    /**
     * @inheritdoc
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
        return $this->getFactory()
            ->createZedCompanyBusinessUnitsRestApiStub()
            ->create($restCompanyBusinessUnitsRequestAttributesTransfer);
    }

    /**
     * Specification:
     *  - Update a company business unit from RestCompanyBusinessUnitsRequestTransfer
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
        return $this->getFactory()
            ->createZedCompanyBusinessUnitsRestApiStub()
            ->update($restCompanyBusinessUnitsRequestTransfer);
    }
}
