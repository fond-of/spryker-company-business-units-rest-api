<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Mapper;

use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiConfig;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsAttributesTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface;

class CompanyBusinessUnitsResourceMapper implements CompanyBusinessUnitsResourceMapperInterface
{
    /**
     * @var \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
     */
    protected $restResourceBuilder;

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
     */
    public function __construct(RestResourceBuilderInterface $restResourceBuilder)
    {
        $this->restResourceBuilder = $restResourceBuilder;
    }

    /**
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsAttributesTransfer $restCompanyBusinessUnitsAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    public function mapCompanyAttributesToCompanyBusinessUnitTransfer(
        RestCompanyBusinessUnitsAttributesTransfer $restCompanyBusinessUnitsAttributesTransfer
    ): CompanyBusinessUnitTransfer {
        return (new CompanyBusinessUnitTransfer())->fromArray($restCompanyBusinessUnitsAttributesTransfer->toArray(), true);
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface
     */
    public function mapCompanyBusinessUnitTransferToRestResource(CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
    ): RestResourceInterface
    {
        $restCompaniesResponseAttributesTransfer = (new RestCompanyBusinessUnitsAttributesTransfer())
            ->fromArray($companyBusinessUnitTransfer->toArray(), true);

        return $this->restResourceBuilder->createRestResource(
            CompanyBusinessUnitsRestApiConfig::RESOURCE_COMPANY_BUSINESS_UNITS,
            $companyBusinessUnitTransfer->getExternalReference(),
            $restCompaniesResponseAttributesTransfer
        );
    }
}
