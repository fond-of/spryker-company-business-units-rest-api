<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits;

use FondOfSpryker\Client\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiClientInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiConfig;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiErrorInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseAttributesTransfer;
use Generated\Shared\Transfer\RestUserTransfer;
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
     * @var \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsMapperInterface
     */
    protected $companyBusinessUnitsMapper;

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
     * @param \FondOfSpryker\Client\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiClientInterface $companyBusinessUnitsRestApiClient
     * @param \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsMapperInterface $companyBusinessUnitsMapper
     * @param \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiErrorInterface $restApiError
     */
    public function __construct(
        RestResourceBuilderInterface $restResourceBuilder,
        CompanyBusinessUnitsRestApiClientInterface $companyBusinessUnitsRestApiClient,
        CompanyBusinessUnitsMapperInterface $companyBusinessUnitsMapper,
        RestApiErrorInterface $restApiError
    ) {
        $this->restResourceBuilder = $restResourceBuilder;
        $this->companyBusinessUnitsRestApiClient = $companyBusinessUnitsRestApiClient;
        $this->companyBusinessUnitsMapper = $companyBusinessUnitsMapper;
        $this->restApiError = $restApiError;
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function findCompanyBusinessUnitCollectionByIdCustomer(RestRequestInterface $restRequest): RestResponseInterface
    {
        $restResponse = $this->restResourceBuilder->createRestResponse();

        $customerTransfer = (new CustomerTransfer())
            ->setIdCustomer($restRequest->getRestUser()->getSurrogateIdentifier());

        $companyBusinessUnitCollectionTransfer = $this->companyBusinessUnitsRestApiClient
            ->findCompanyBusinessUnitCollectionByIdCustomer($customerTransfer);

        return $this->createCompanyBusinessUnitCollectionResponse(
            $companyBusinessUnitCollectionTransfer,
            $restResponse
        );
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer $companyBusinessUnitCollectionTransfer
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface $restResponse
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    protected function createCompanyBusinessUnitCollectionResponse(
        CompanyBusinessUnitCollectionTransfer $companyBusinessUnitCollectionTransfer,
        RestResponseInterface $restResponse
    ): RestResponseInterface {
        foreach ($companyBusinessUnitCollectionTransfer->getCompanyBusinessUnits() as $companyBusinessUnit) {
            $this->createCompanyBusinessUnitResponse($companyBusinessUnit, $restResponse);
        }

        return $restResponse;
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function findCompanyBusinessUnitByUuid(RestRequestInterface $restRequest): RestResponseInterface
    {
        $restResponse = $this->restResourceBuilder->createRestResponse();

        if (!$restRequest->getResource()->getId()) {
            return $this->restApiError->addUuidMissingError($restResponse);
        }

        $companyBusinessUnitTransfer = (new CompanyBusinessUnitTransfer())
            ->setUuid($restRequest->getResource()->getId());

        $restCompanyBusinessUnitResponseTransfer = $this->companyBusinessUnitsRestApiClient
            ->findCompanyBusinessUnitByUuid($companyBusinessUnitTransfer);

        if (!$restCompanyBusinessUnitResponseTransfer->getIsSuccessful()) {
            return $this->restApiError->addCompanyBusinessUnitNotFoundError($restResponse);
        }

        if (!$this->isCompanyBusinessUnitAssignedToRestUser($companyBusinessUnitTransfer, $restRequest->getRestUser())) {
            return $this->restApiError->addCompanyBusinessUnitNoPermissionError($restResponse);
        }

        return $this->createCompanyBusinessUnitResponse(
            $restCompanyBusinessUnitResponseTransfer->getCompanyBusinessUnitTransfer(),
            $restResponse
        );
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     * @param \Generated\Shared\Transfer\RestUserTransfer $restUserTransfer
     *
     * @return bool
     */
    protected function isCompanyBusinessUnitAssignedToRestUser(
        CompanyBusinessUnitTransfer $companyBusinessUnitTransfer,
        RestUserTransfer $restUserTransfer
    ): bool {
        $customerTransfer = (new CustomerTransfer())
            ->setIdCustomer($restUserTransfer->getSurrogateIdentifier());

        $companyBusinessUnitCollectionTransfer = $this->companyBusinessUnitsRestApiClient->findCompanyBusinessUnitCollectionByIdCustomer($customerTransfer);

        foreach ($companyBusinessUnitCollectionTransfer->getCompanyBusinessUnits() as $companyBusinessUnit) {
            if ($companyBusinessUnit->getUuid() === $companyBusinessUnitTransfer->getUuid()) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface $restResponse
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    protected function createCompanyBusinessUnitResponse(
        CompanyBusinessUnitTransfer $companyBusinessUnitTransfer,
        RestResponseInterface $restResponse
    ): RestResponseInterface {
        $restCompanyBusinessUnitAttributeTransfer = $this->companyBusinessUnitsMapper
            ->mapCompanyBusinessUnitTransferToRestCompanyBusinessUnitsResponseAttributesTransfer(
                $companyBusinessUnitTransfer,
                new RestCompanyBusinessUnitsResponseAttributesTransfer()
            );

        $restResource = $this->restResourceBuilder->createRestResource(
            CompanyBusinessUnitsRestApiConfig::RESOURCE_COMPANY_BUSINESS_UNITS,
            $restCompanyBusinessUnitAttributeTransfer->getUuid(),
            $restCompanyBusinessUnitAttributeTransfer
        );

        return $restResponse->addResource($restResource);
    }
}
