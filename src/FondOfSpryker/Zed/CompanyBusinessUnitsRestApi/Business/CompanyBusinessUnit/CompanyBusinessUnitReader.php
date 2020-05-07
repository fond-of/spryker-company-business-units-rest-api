<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit;

use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepositoryInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

class CompanyBusinessUnitReader implements CompanyBusinessUnitReaderInterface
{
    /**
     * @var \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepositoryInterface
     */
    protected $companyBusinessUnitsRestApiRepository;

    /**
     * @param \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepositoryInterface $companyBusinessUnitsRestApiRepository
     */
    public function __construct(CompanyBusinessUnitsRestApiRepositoryInterface $companyBusinessUnitsRestApiRepository)
    {
        $this->companyBusinessUnitsRestApiRepository = $companyBusinessUnitsRestApiRepository;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer
     */
    public function findCompanyBusinessUnitCollectionByIdCustomer(
        CustomerTransfer $customerTransfer
    ): CompanyBusinessUnitCollectionTransfer {
        $customerTransfer->requireIdCustomer();

        return $this->companyBusinessUnitsRestApiRepository->findCompanyBusinessUnitCollectionByIdCustomer(
            $customerTransfer->getIdCustomer()
        );
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer
     */
    public function findCompanyBusinessUnitByUuid(
        CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
    ): CompanyBusinessUnitResponseTransfer {
        $companyBusinessUnitTransfer->requireUuid();

        $companyBusinessUnitTransfer = $this->companyBusinessUnitsRestApiRepository->findCompanyBusinessUnitByUuid(
            $companyBusinessUnitTransfer->getUuid()
        );

        $companyBusinessUnitResponseTransfer = new CompanyBusinessUnitResponseTransfer();

        if ($companyBusinessUnitTransfer === null) {
            return $companyBusinessUnitResponseTransfer
                ->setIsSuccessful(false);
        }

        return $companyBusinessUnitResponseTransfer
            ->setIsSuccessful(true)
            ->setCompanyBusinessUnitTransfer($companyBusinessUnitTransfer);
    }
}
