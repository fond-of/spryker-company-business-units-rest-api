<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits;

use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Dependency\Client\CompanyBusinessUnitsRestApiToCompanyBusinessUnitClientInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Mapper\CompanyBusinessUnitsResourceMapperInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiErrorInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiValidatorInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
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
     * @var \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Mapper\CompanyBusinessUnitsResourceMapperInterface
     */
    protected $companyBusinessUnitsResourceMapper;

    /**
     * @var \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Dependency\Client\CompanyBusinessUnitsRestApiToCompanyBusinessUnitClientInterface
     */
    protected $companyBusinessUnitClient;

    /**
     * @var \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiErrorInterface
     */
    protected $restApiError;

    /**
     * @var \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiValidatorInterface
     */
    protected $restApiValidator;

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
     * @param \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Mapper\CompanyBusinessUnitsResourceMapperInterface $companyBusinessUnitsResourceMapper
     * @param \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Dependency\Client\CompanyBusinessUnitsRestApiToCompanyBusinessUnitClientInterface $companyBusinessUnitClient
     * @param \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiErrorInterface $restApiError
     * @param \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiValidatorInterface $restApiValidator
     */
    public function __construct(
        RestResourceBuilderInterface $restResourceBuilder,
        CompanyBusinessUnitsResourceMapperInterface $companyBusinessUnitsResourceMapper,
        CompanyBusinessUnitsRestApiToCompanyBusinessUnitClientInterface $companyBusinessUnitClient,
        RestApiErrorInterface $restApiError,
        RestApiValidatorInterface $restApiValidator
    ) {
        $this->restResourceBuilder = $restResourceBuilder;
        $this->companyBusinessUnitsResourceMapper = $companyBusinessUnitsResourceMapper;
        $this->companyBusinessUnitClient = $companyBusinessUnitClient;
        $this->restApiError = $restApiError;
        $this->restApiValidator = $restApiValidator;
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

        $companyBusinessUnitTransfer = (new CompanyBusinessUnitTransfer())->setExternalReference($restRequest->getResource()->getId());
        $companyBusinessUnitResponseTransfer = $this->companyBusinessUnitClient->findCompanyBusinessUnitByExternalReference($companyBusinessUnitTransfer);

        $restResponse = $this->restApiValidator->validateCompanyBusinessUnitResponseTransfer(
            $companyBusinessUnitResponseTransfer,
            $restRequest,
            $restResponse
        );

        if (count($restResponse->getErrors()) > 0) {
            return $restResponse;
        }

        $companyBusinessUnitsResource = $this->companyBusinessUnitsResourceMapper
            ->mapCompanyBusinessUnitTransferToRestResource($companyBusinessUnitResponseTransfer->getCompanyBusinessUnitTransfer());

        $restResponse->addResource($companyBusinessUnitsResource);

        return $restResponse;
    }
}
