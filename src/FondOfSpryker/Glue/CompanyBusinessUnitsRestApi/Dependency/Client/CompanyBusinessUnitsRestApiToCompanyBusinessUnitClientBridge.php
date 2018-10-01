<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Dependency\Client;

use FondOfSpryker\Client\CompanyBusinessUnit\CompanyBusinessUnitClientInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;

class CompanyBusinessUnitsRestApiToCompanyBusinessUnitClientBridge implements CompanyBusinessUnitsRestApiToCompanyBusinessUnitClientInterface
{
    /**
     * @var \FondOfSpryker\Client\CompanyBusinessUnit\CompanyBusinessUnitClientInterface
     */
    protected $companyBusinessUnitClient;

    /**
     * @param \FondOfSpryker\Client\CompanyBusinessUnit\CompanyBusinessUnitClientInterface $companyBusinessUnitClient
     */
    public function __construct(CompanyBusinessUnitClientInterface $companyBusinessUnitClient)
    {
        $this->companyBusinessUnitClient = $companyBusinessUnitClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer
     */
    public function findCompanyBusinessUnitByExternalReference(CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
    ): CompanyBusinessUnitResponseTransfer
    {
        return $this->companyBusinessUnitClient->findCompanyBusinessUnitByExternalReference($companyBusinessUnitTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer
     */
    public function createCompanyBusinessUnit(CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
    ): CompanyBusinessUnitResponseTransfer
    {
        return $this->companyBusinessUnitClient->createCompanyBusinessUnit($companyBusinessUnitTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer
     */
    public function updateCompanyBusinessUnit(CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
    ): CompanyBusinessUnitResponseTransfer
    {
        return $this->companyBusinessUnitClient->updateCompanyBusinessUnit($companyBusinessUnitTransfer);
    }
}
