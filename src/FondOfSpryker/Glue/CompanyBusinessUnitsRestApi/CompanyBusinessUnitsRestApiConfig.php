<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi;

class CompanyBusinessUnitsRestApiConfig
{
    public const RESOURCE_COMPANY_BUSINESS_UNITS = 'company-business-units';

    public const CONTROLLER_COMPANY_BUSINESS_UNITS = 'company-business-units-resource';

    public const ACTION_COMPANY_BUSINESS_UNITS_GET = 'get';
    public const ACTION_COMPANY_BUSINESS_UNITS_POST = 'post';
    public const ACTION_COMPANY_BUSINESS_UNITS_PATCH = 'patch';

    public const RESPONSE_CODE_EXTERNAL_REFERENCE_MISSING = '400';
    public const RESPONSE_DETAILS_EXTERNAL_REFERENCE_MISSING = 'External reference is missing.';

    public const RESPONSE_CODE_COMPANY_NOT_FOUND = '401';
    public const RESPONSE_DETAILS_COMPANY_BUSINESS_UNIT_NOT_FOUND = 'Company business unit not found.';

    public const RESPONSE_CODE_COMPANY_BUSINESS_UNIT_FAILED_TO_CREATE = '402';

    public const RESPONSE_CODE_COMPANY_BUSINESS_UNIT_FAILED_TO_SAVE = '403';
    public const RESPONSE_DETAILS_COMPANY_BUSINESS_UNIT_FAILED_TO_SAVE = 'Failed to save company business unut.';
}
