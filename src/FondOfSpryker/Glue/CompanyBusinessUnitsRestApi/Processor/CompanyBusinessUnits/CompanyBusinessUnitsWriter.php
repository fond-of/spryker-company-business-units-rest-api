<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits;

use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Dependency\Client\CompanyBusinessUnitsRestApiToCompanyBusinessUnitClientInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Mapper\CompanyBusinessUnitsResourceMapperInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiErrorInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiValidatorInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsAttributesTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class CompanyBusinessUnitsWriter implements CompanyBusinessUnitsWriterInterface
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
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsAttributesTransfer $restCompanyBusinessUnitsAttributesTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function createCompanyBusinessUnit(
        RestCompanyBusinessUnitsAttributesTransfer $restCompanyBusinessUnitsAttributesTransfer
    ): RestResponseInterface {
        $restResponse = $this->restResourceBuilder->createRestResponse();

        $companyBusinessUnitTransfer = (new CompanyBusinessUnitTransfer())
            ->fromArray($restCompanyBusinessUnitsAttributesTransfer->toArray(), true);

        $companyBusinessUnitResponseTransfer = $this->companyBusinessUnitClient->createCompanyBusinessUnit($companyBusinessUnitTransfer);

        if (!$companyBusinessUnitResponseTransfer->getIsSuccessful()) {
            foreach ($companyBusinessUnitResponseTransfer->getMessages() as $message) {
                return $this->restApiError->addCompanyBusinessUnitCantCreateMessageError($restResponse, $message->getText());
            }
        }

        $restResource = $this->companyBusinessUnitsResourceMapper->mapCompanyBusinessUnitTransferToRestResource($companyBusinessUnitResponseTransfer->getCompanyBusinessUnitTransfer());

        return $restResponse->addResource($restResource);
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsAttributesTransfer $restCompanyBusinessUnitsAttributesTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function updateCompanyBusinessUnit(
        RestRequestInterface $restRequest,
        RestCompanyBusinessUnitsAttributesTransfer $restCompanyBusinessUnitsAttributesTransfer
    ): RestResponseInterface {
        $restResponse = $this->restResourceBuilder->createRestResponse();

        $companyTransfer = (new CompanyBusinessUnitTransfer())->setExternalReference($restRequest->getResource()->getId());

        $companyBusinessUnitResponseTransfer = $this->companyBusinessUnitClient->findCompanyByExternalReference($companyTransfer);

        $restResponse = $this->restApiValidator->validateCompanyResponseTransfer(
            $companyBusinessUnitResponseTransfer,
            $restRequest,
            $restResponse
        );

        if (count($restResponse->getErrors()) > 0) {
            return $restResponse;
        }

        $companyBusinessUnitResponseTransfer->getCompanyBusinessUnitTransfer()->fromArray(
            $this->getCompanyBusinessUnitData($restCompanyBusinessUnitsAttributesTransfer)
        );

        $companyBusinessUnitResponseTransfer = $this->companyBusinessUnitClient->updateCompany($companyBusinessUnitResponseTransfer->getCompanyBusinessUnitTransfer());

        if (!$companyBusinessUnitResponseTransfer->getIsSuccessful()) {
            return $this->restApiError->addCompanyNotSavedError($restResponse);
        }

        $restResource = $this->companyBusinessUnitsResourceMapper->mapCompanyBusinessUnitTransferToRestResource($companyBusinessUnitResponseTransfer->getCompanyBusinessUnitTransfer());

        return $restResponse->addResource($restResource);
    }

    /**
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsAttributesTransfer $restCompanyBusinessUnitsAttributesTransfer
     *
     * @return array
     */
    protected function getCompanyBusinessUnitData(RestCompanyBusinessUnitsAttributesTransfer $restCompanyBusinessUnitsAttributesTransfer): array
    {
        $companyBusinessUnitData = $restCompanyBusinessUnitsAttributesTransfer->modifiedToArray(true, true);

        return $this->cleanUpCompanyBusinessUnitData($companyBusinessUnitData);
    }

    /**
     * @param array $companyBusinessUnitData
     *
     * @return array
     */
    protected function cleanUpCompanyBusinessUnitData(array $companyBusinessUnitData): array
    {
        return $companyBusinessUnitData;
    }
}
