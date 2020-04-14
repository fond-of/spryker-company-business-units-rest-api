<?php

namespace FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Zed;

use FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Dependency\Client\CompanyBusinessUnitsRestApiToZedRequestClientInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

class CompanyBusinessUnitsRestApiStub implements CompanyBusinessUnitsRestApiStubInterface
{
    /**
     * @var \FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Dependency\Client\CompanyBusinessUnitsRestApiToZedRequestClientInterface
     */
    protected $zedRequestClient;

    /**
     * @param \FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Dependency\Client\CompanyBusinessUnitsRestApiToZedRequestClientInterface $zedRequestClient
     */
    public function __construct(CompanyBusinessUnitsRestApiToZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer
     */
    public function findCompanyBusinessUnitByUuid(
        CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
    ): CompanyBusinessUnitResponseTransfer {
        /** @var \Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer $companyBusinessUnitTransfer */
        $companyBusinessUnitTransfer = $this->zedRequestClient->call(
            '/company-business-units-rest-api/gateway/find-company-business-unit-by-uuid',
            $companyBusinessUnitTransfer
        );

        return $companyBusinessUnitTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer
     */
    public function findCompanyBusinessUnitCollectionByIdCustomer(
        CustomerTransfer $customerTransfer
    ): CompanyBusinessUnitCollectionTransfer {
        /** @var \Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer $companyBusinessUnitCollectionTransfer */
        $companyBusinessUnitCollectionTransfer = $this->zedRequestClient->call(
            '/company-business-units-rest-api/gateway/find-company-business-unit-collection-by-id-customer',
            $customerTransfer
        );

        return $companyBusinessUnitCollectionTransfer;
    }
}
