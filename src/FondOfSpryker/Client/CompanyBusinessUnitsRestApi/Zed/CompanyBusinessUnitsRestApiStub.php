<?php

namespace FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Zed;

use FondOfSpryker\Client\CompanyBusinessUnitsRestApi\Dependency\Client\CompanyBusinessUnitsRestApiToZedRequestClientInterface;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer;

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
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    public function findCompanyBusinessUnitByExternalReference(
        RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
    ): RestCompanyBusinessUnitsResponseTransfer {
        /** @var \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer $restCompanyBusinessUnitsResponseTransfer */
        $restCompanyBusinessUnitsResponseTransfer = $this->zedRequestClient->call(
            '/company-business-units-rest-api/gateway/find-company-business-unit-by-external-reference',
            $restCompanyBusinessUnitsRequestAttributesTransfer
        );

        return $restCompanyBusinessUnitsResponseTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    public function create(RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer): RestCompanyBusinessUnitsResponseTransfer
    {
        /** @var \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer $restCompanyBusinessUnitsResponseTransfer */
        $restCompanyBusinessUnitsResponseTransfer = $this->zedRequestClient->call(
            '/company-business-units-rest-api/gateway/create',
            $restCompanyBusinessUnitsRequestAttributesTransfer
        );

        return $restCompanyBusinessUnitsResponseTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestTransfer $restCompanyBusinessUnitsRequestTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    public function update(RestCompanyBusinessUnitsRequestTransfer $restCompanyBusinessUnitsRequestTransfer
    ): RestCompanyBusinessUnitsResponseTransfer
    {
        /** @var \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer $restCompanyBusinessUnitsResponseTransfer */
        $restCompanyBusinessUnitsResponseTransfer = $this->zedRequestClient->call(
            '/company-business-units-rest-api/gateway/update',
            $restCompanyBusinessUnitsRequestTransfer
        );

        return $restCompanyBusinessUnitsResponseTransfer;
    }
}
