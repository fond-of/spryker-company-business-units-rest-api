<?php

namespace FondOfSpryker\Client\CompanyBusinessUnitsRestApi;

use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \FondOfSpryker\Client\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiFactory getFactory()
 */
class CompanyBusinessUnitsRestApiClient extends AbstractClient implements CompanyBusinessUnitsRestApiClientInterface
{
    /**
     * @inheritdoc
     *
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer
     *
     * @api
     */
    public function findCompanyBusinessUnitByUuid(
        CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
    ): CompanyBusinessUnitResponseTransfer {
        return $this->getFactory()
            ->createZedCompanyBusinessUnitsRestApiStub()
            ->findCompanyBusinessUnitByUuid($companyBusinessUnitTransfer);
    }

    /**
     * @inheritdoc
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer
     *
     * @api
     */
    public function findCompanyBusinessUnitCollectionByIdCustomer(
        CustomerTransfer $customerTransfer
    ): CompanyBusinessUnitCollectionTransfer {
        return $this->getFactory()
            ->createZedCompanyBusinessUnitsRestApiStub()
            ->findCompanyBusinessUnitCollectionByIdCustomer($customerTransfer);
    }
}
