<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits;

use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiConfig;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CompanyUserTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseAttributesTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class CompanyBusinessUnitsResourceRelationshipExpander implements CompanyBusinessUnitsResourceRelationshipExpanderInterface
{
    /**
     * @var \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
     */
    protected $restResourceBuilder;

    /**
     * @var \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsMapperInterface
     */
    protected $companyBusinessUnitMapper;

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
     * @param \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsMapperInterface $companyBusinessUnitMapper
     */
    public function __construct(
        RestResourceBuilderInterface $restResourceBuilder,
        CompanyBusinessUnitsMapperInterface $companyBusinessUnitMapper
    ) {
        $this->restResourceBuilder = $restResourceBuilder;
        $this->companyBusinessUnitMapper = $companyBusinessUnitMapper;
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface[] $resources
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface[]
     */
    public function addResourceRelationships(array $resources, RestRequestInterface $restRequest): array
    {
        foreach ($resources as $resource) {
            /**
             * @var \Generated\Shared\Transfer\CompanyUserTransfer|null $payload
             */
            $payload = $resource->getPayload();

            if ($payload === null || !($payload instanceof CompanyUserTransfer)) {
                continue;
            }

            $companyBusinessUnitTransfer = $payload->getCompanyBusinessUnit();

            if ($companyBusinessUnitTransfer === null) {
                continue;
            }

            $companyBusinessUnitResource = $this->createCompanyBusinessUnitResource(
                $companyBusinessUnitTransfer
            );

            $resource->addRelationship($companyBusinessUnitResource);
        }

        return $resources;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface
     */
    protected function createCompanyBusinessUnitResource(
        CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
    ): RestResourceInterface {
        $restCompanyBusinessUnitAttributesTransfer = $this->companyBusinessUnitMapper
            ->mapCompanyBusinessUnitTransferToRestCompanyBusinessUnitsResponseAttributesTransfer(
                $companyBusinessUnitTransfer,
                new RestCompanyBusinessUnitsResponseAttributesTransfer()
            );

        $companyBusinessUnitResource = $this->restResourceBuilder->createRestResource(
            CompanyBusinessUnitsRestApiConfig::RESOURCE_COMPANY_BUSINESS_UNITS,
            $companyBusinessUnitTransfer->getUuid(),
            $restCompanyBusinessUnitAttributesTransfer
        );

        return $companyBusinessUnitResource;
    }
}
