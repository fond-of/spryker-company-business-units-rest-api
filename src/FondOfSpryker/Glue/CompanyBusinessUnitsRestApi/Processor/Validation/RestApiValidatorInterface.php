<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation;

use Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

interface RestApiValidatorInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer $companyBusinessUnitResponseTransfer
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface $restResponse
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function validateCompanyBusinessUnitResponseTransfer(
        CompanyBusinessUnitResponseTransfer $companyBusinessUnitResponseTransfer,
        RestRequestInterface $restRequest,
        RestResponseInterface $restResponse
    ): RestResponseInterface;
}
