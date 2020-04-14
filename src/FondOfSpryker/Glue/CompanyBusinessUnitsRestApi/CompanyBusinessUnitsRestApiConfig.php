<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi;

class CompanyBusinessUnitsRestApiConfig
{
    public const RESOURCE_COMPANY_BUSINESS_UNITS = 'company-business-units';

    public const CONTROLLER_COMPANY_BUSINESS_UNITS = 'company-business-units-resource';

    public const ACTION_COMPANY_BUSINESS_UNITS_GET = 'get';

    public const RESPONSE_CODE_UUID_MISSING = '1000';
    public const RESPONSE_DETAILS_UUID_MISSING = 'Uuid is missing.';

    public const RESPONSE_CODE_COMPANY_BUSINESS_UNIT_NOT_FOUND = '1001';
    public const RESPONSE_DETAILS_COMPANY_BUSINESS_UNIT_NOT_FOUND = 'Company business unit not found.';

    public const RESPONSE_CODE_COMPANY_BUSINESS_UNIT_NO_PERMISSION = '1002';
    public const RESPONSE_DETAILS_COMPANY_BUSINESS_UNIT_NO_PERMISSION = 'No permission to read company business unit.';
}
