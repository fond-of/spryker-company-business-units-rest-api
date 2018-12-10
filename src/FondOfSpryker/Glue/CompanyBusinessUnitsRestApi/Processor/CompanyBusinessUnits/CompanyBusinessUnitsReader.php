<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits;

use FondOfSpryker\Client\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiClientInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiConfig;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiErrorInterface;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer;
use Generated\Shared\Transfer\RestErrorMessageTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class CompanyBusinessUnitsReader implements CompanyBusinessUnitsReaderInterface
{
    /**
     * @var \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
     */
    protected $restResourceBuilder;

    /**
     * @var \FondOfSpryker\Client\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiClientInterface
     */
    protected $companyBusinessUnitsRestApiClient;

    /**
     * @var \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiErrorInterface
     */
    protected $restApiError;

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
     * @param \FondOfSpryker\Client\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiClientInterface $companyBusinessUnitsRestApiClient
     * @param \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiErrorInterface $restApiError
     */
    public function __construct(
        RestResourceBuilderInterface $restResourceBuilder,
        CompanyBusinessUnitsRestApiClientInterface $companyBusinessUnitsRestApiClient,
        RestApiErrorInterface $restApiError
    ) {
        $this->restResourceBuilder = $restResourceBuilder;
        $this->companyBusinessUnitsRestApiClient = $companyBusinessUnitsRestApiClient;
        $this->restApiError = $restApiError;
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function findCompanyBusinessUnitByExternalReference(RestRequestInterface $restRequest): RestResponseInterface
    {
        $restResponse = $this->restResourceBuilder->createRestResponse();

        if (!$restRequest->getResource()->getId()) {
            return $this->restApiError->addExternalReferenceMissingError($restResponse);
        }

        $restCompanyBusinessUnitsRequestAttributesTransfer = new RestCompanyBusinessUnitsRequestAttributesTransfer();
        $restCompanyBusinessUnitsRequestAttributesTransfer->setExternalReference($restRequest->getResource()->getId());

        $restCompanyBusinessUnitsResponseTransfer = $this->companyBusinessUnitsRestApiClient
            ->findCompanyBusinessUnitByExternalReference($restCompanyBusinessUnitsRequestAttributesTransfer);

        if (!$restCompanyBusinessUnitsResponseTransfer->getIsSuccess()) {
            return $this->createLoadCompanyBusinessUnitFailedErrorResponse($restCompanyBusinessUnitsResponseTransfer);
        }

        return $this->createCompanyBusinessUnitLoadedResponse($restCompanyBusinessUnitsResponseTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer $restCompanyBusinessUnitsResponseTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    protected function createCompanyBusinessUnitLoadedResponse(
        RestCompanyBusinessUnitsResponseTransfer $restCompanyBusinessUnitsResponseTransfer
    ): RestResponseInterface {
        $restCompanyBusinessUnitsResponseAttributesTransfer = $restCompanyBusinessUnitsResponseTransfer->getRestCompanyBusinessUnitsResponseAttributes();

        $restResource = $this->restResourceBuilder->createRestResource(
            CompanyBusinessUnitsRestApiConfig::RESOURCE_COMPANY_BUSINESS_UNITS,
            $restCompanyBusinessUnitsResponseAttributesTransfer->getExternalReference(),
            $restCompanyBusinessUnitsResponseAttributesTransfer
        );

        return $this->restResourceBuilder
            ->createRestResponse()
            ->addResource($restResource);
    }

    /**
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer $restCompanyBusinessUnitsResponseTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    protected function createLoadCompanyBusinessUnitFailedErrorResponse(
        RestCompanyBusinessUnitsResponseTransfer $restCompanyBusinessUnitsResponseTransfer
    ): RestResponseInterface {
        $restResponse = $this->restResourceBuilder->createRestResponse();

        foreach ($restCompanyBusinessUnitsResponseTransfer->getErrors() as $restCompanyBusinessUnitsErrorTransfer) {
            $restResponse->addError((new RestErrorMessageTransfer())
                ->setCode($restCompanyBusinessUnitsErrorTransfer->getCode())
                ->setStatus($restCompanyBusinessUnitsErrorTransfer->getStatus())
                ->setDetail($restCompanyBusinessUnitsErrorTransfer->getDetail()));
        }

        return $restResponse;
    }
}
