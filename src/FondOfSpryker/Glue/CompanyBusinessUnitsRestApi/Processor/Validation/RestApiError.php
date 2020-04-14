<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation;

use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiConfig;
use Generated\Shared\Transfer\RestErrorMessageTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Symfony\Component\HttpFoundation\Response;

class RestApiError implements RestApiErrorInterface
{
    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface $restResponse
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function addUuidMissingError(RestResponseInterface $restResponse): RestResponseInterface
    {
        $restErrorTransfer = (new RestErrorMessageTransfer())
            ->setCode(CompanyBusinessUnitsRestApiConfig::RESPONSE_CODE_UUID_MISSING)
            ->setStatus(Response::HTTP_BAD_REQUEST)
            ->setDetail(CompanyBusinessUnitsRestApiConfig::RESPONSE_DETAILS_UUID_MISSING);

        return $restResponse->addError($restErrorTransfer);
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface $restResponse
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function addCompanyBusinessUnitNotFoundError(RestResponseInterface $restResponse): RestResponseInterface
    {
        $restErrorTransfer = (new RestErrorMessageTransfer())
            ->setCode(CompanyBusinessUnitsRestApiConfig::RESPONSE_CODE_COMPANY_BUSINESS_UNIT_NOT_FOUND)
            ->setStatus(Response::HTTP_BAD_REQUEST)
            ->setDetail(CompanyBusinessUnitsRestApiConfig::RESPONSE_DETAILS_COMPANY_BUSINESS_UNIT_NOT_FOUND);

        return $restResponse->addError($restErrorTransfer);
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface $restResponse
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function addCompanyBusinessUnitNoPermissionError(RestResponseInterface $restResponse): RestResponseInterface
    {
        $restErrorTransfer = (new RestErrorMessageTransfer())
            ->setCode(CompanyBusinessUnitsRestApiConfig::RESPONSE_CODE_COMPANY_BUSINESS_UNIT_NO_PERMISSION)
            ->setStatus(Response::HTTP_BAD_REQUEST)
            ->setDetail(CompanyBusinessUnitsRestApiConfig::RESPONSE_DETAILS_COMPANY_BUSINESS_UNIT_NO_PERMISSION);

        return $restResponse->addError($restErrorTransfer);
    }
}
