<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Plugin;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiConfig;

class CompanyBusinessUnitsCompanyUsersResourceRelationshipPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Plugin\CompanyBusinessUnitsCompanyUsersResourceRelationshipPlugin
     */
    protected $companyBusinessUnitsCompanyUsersResourceRelationshipPlugin;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->companyBusinessUnitsCompanyUsersResourceRelationshipPlugin = new CompanyBusinessUnitsCompanyUsersResourceRelationshipPlugin();
    }

    /**
     * @return void
     */
    public function testGetRelationshipResourceType(): void
    {
        $this->assertSame(
            CompanyBusinessUnitsRestApiConfig::RESOURCE_COMPANY_BUSINESS_UNITS,
            $this->companyBusinessUnitsCompanyUsersResourceRelationshipPlugin->getRelationshipResourceType()
        );
    }
}
