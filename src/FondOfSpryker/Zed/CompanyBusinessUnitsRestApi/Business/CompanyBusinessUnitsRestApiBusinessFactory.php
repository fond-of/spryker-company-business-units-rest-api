<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business;

use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitMapper;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitMapperInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitReader;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitReaderInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitWriter;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitWriterInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiDependencyProvider;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Dependency\Facade\CompanyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepositoryInterface getRepository()
 */
class CompanyBusinessUnitsRestApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitReaderInterface
     */
    public function createCompanyBusinessUnitReader(): CompanyBusinessUnitReaderInterface
    {
        return new CompanyBusinessUnitReader(
            $this->getRepository()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitWriterInterface
     */
    public function createCompanyBusinessUnitWriter(): CompanyBusinessUnitWriterInterface
    {
        return new CompanyBusinessUnitWriter(
            $this->getRepository(),
            $this->getCompanyBusinessUnitFacade(),
            $this->getCompanyBusinessUnitMapperPlugins()
        );
    }

    /**
     * @throws
     *
     * @return \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Dependency\Plugin\CompanyBusinessUnitMapperPluginInterface[]
     */
    protected function getCompanyBusinessUnitMapperPlugins(): array
    {
        return $this->getProvidedDependency(CompanyBusinessUnitsRestApiDependencyProvider::PLUGINS_COMPANY_BUSINESS_UNIT_MAPPER);
    }

    /**
     * @throws
     *
     * @return \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Dependency\Facade\CompanyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterface
     */
    protected function getCompanyBusinessUnitFacade(): CompanyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterface
    {
        return $this->getProvidedDependency(CompanyBusinessUnitsRestApiDependencyProvider::FACADE_COMPANY_BUSINESS_UNIT);
    }

    /**
     * @return \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit\CompanyBusinessUnitMapperInterface
     */
    public function createCompanyBusinessUnitMapper(): CompanyBusinessUnitMapperInterface
    {
        return new CompanyBusinessUnitMapper();
    }
}
