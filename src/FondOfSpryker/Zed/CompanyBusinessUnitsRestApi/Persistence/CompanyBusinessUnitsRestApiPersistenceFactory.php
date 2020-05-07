<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence;

use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiDependencyProvider;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\Mapper\CompanyBusinessUnitMapper;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\Mapper\CompanyBusinessUnitMapperInterface;
use Orm\Zed\CompanyBusinessUnit\Persistence\SpyCompanyBusinessUnitQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepositoryInterface getRepository()
 */
class CompanyBusinessUnitsRestApiPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\CompanyBusinessUnit\Persistence\SpyCompanyBusinessUnitQuery
     */
    public function getCompanyBusinessUnitPropelQuery(): SpyCompanyBusinessUnitQuery
    {
        return $this->getProvidedDependency(CompanyBusinessUnitsRestApiDependencyProvider::PROPEL_QUERY_COMPANY_BUSINESS_UNIT);
    }

    /**
     * @return \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\Mapper\CompanyBusinessUnitMapperInterface
     */
    public function createCompanyBusinessUnitMapper(): CompanyBusinessUnitMapperInterface
    {
        return new CompanyBusinessUnitMapper();
    }
}
