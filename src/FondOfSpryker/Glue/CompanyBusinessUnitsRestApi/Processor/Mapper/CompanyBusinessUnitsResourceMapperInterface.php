<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Mapper;

use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsAttributesTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface;

interface CompanyBusinessUnitsResourceMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsAttributesTransfer $restCompanyBusinessUnitsAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    public function mapCompanyAttributesToCompanyBusinessUnitTransfer(RestCompanyBusinessUnitsAttributesTransfer $restCompanyBusinessUnitsAttributesTransfer): CompanyBusinessUnitTransfer;

    /**
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface
     */
    public function mapCompanyBusinessUnitTransferToRestResource(CompanyBusinessUnitTransfer $companyBusinessUnitTransfer): RestResourceInterface;
}
