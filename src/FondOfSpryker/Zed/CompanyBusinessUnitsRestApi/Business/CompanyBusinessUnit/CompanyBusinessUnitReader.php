<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit;

use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiConfig;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepositoryInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsErrorTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer;
use Symfony\Component\HttpFoundation\Response;

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
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    public function findCompanyBusinessUnitByExternalReference(
        RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
    ): RestCompanyBusinessUnitsResponseTransfer {
        $companyBusinessUnitTransfer = $this->companyBusinessUnitsRestApiRepository->findCompanyBusinessUnitByExternalReference(
            $restCompanyBusinessUnitsRequestAttributesTransfer->getExternalReference()
        );

        if ($companyBusinessUnitTransfer !== null) {
            return $this->createCompanyBusinessUnitResponseTransfer($companyBusinessUnitTransfer);
        }

        return $this->createCompanyBusinessUnitFailedToLoadErrorResponseTransfer();
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    protected function createCompanyBusinessUnitResponseTransfer(
        CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
    ): RestCompanyBusinessUnitsResponseTransfer {
        $restCompanyBusinessUnitsResponseAttributesTransfer = new RestCompanyBusinessUnitsResponseAttributesTransfer();

        $restCompanyBusinessUnitsResponseAttributesTransfer->fromArray(
            $companyBusinessUnitTransfer->toArray(),
            true
        );

        $restCompanyBusinessUnitsResponseTransfer = new RestCompanyBusinessUnitsResponseTransfer();

        $restCompanyBusinessUnitsResponseTransfer->setIsSuccess(true)
            ->setRestCompanyBusinessUnitsResponseAttributes($restCompanyBusinessUnitsResponseAttributesTransfer);

        return $restCompanyBusinessUnitsResponseTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    protected function createCompanyBusinessUnitFailedToLoadErrorResponseTransfer(): RestCompanyBusinessUnitsResponseTransfer
    {
        $restCompanyBusinessUnitsErrorTransfer = new RestCompanyBusinessUnitsErrorTransfer();

        $restCompanyBusinessUnitsErrorTransfer->setStatus(Response::HTTP_NOT_FOUND)
            ->setCode(CompanyBusinessUnitsRestApiConfig::RESPONSE_CODE_COMPANY_BUSINESS_UNIT_NOT_FOUND)
            ->setDetail(CompanyBusinessUnitsRestApiConfig::RESPONSE_DETAILS_COMPANY_BUSINESS_UNIT_NOT_FOUND);

        $restCompanyBusinessUnitsResponseTransfer = new RestCompanyBusinessUnitsResponseTransfer();

        $restCompanyBusinessUnitsResponseTransfer->setIsSuccess(false)
            ->addError($restCompanyBusinessUnitsErrorTransfer);

        return $restCompanyBusinessUnitsResponseTransfer;
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

        $companyBusinessUnitCollectionTransfer = $this->companyBusinessUnitsRestApiRepository->findCompanyBusinessUnitCollectionByIdCustomer(
            $customerTransfer->getIdCustomer()
        );

        return $companyBusinessUnitCollectionTransfer;
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
