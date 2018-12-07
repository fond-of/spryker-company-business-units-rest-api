<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnit;

use FondOfSpryker\Shared\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiConfig;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Dependency\Facade\CompanyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepositoryInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsErrorTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer;
use Propel\Runtime\Exception\PropelException;
use Symfony\Component\HttpFoundation\Response;

class CompanyBusinessUnitWriter implements CompanyBusinessUnitWriterInterface
{
    /**
     * @var \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepositoryInterface
     */
    protected $companyBusinessUnitsRestApiRepository;

    /**
     * @var \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Dependency\Facade\CompanyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterface
     */
    protected $companyBusinessUnitFacade;

    /**
     * @var \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Dependency\Plugin\CompanyBusinessUnitMapperPluginInterface[]
     */
    protected $companyBusinessUnitMapperPlugins;

    /**
     * @param \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Persistence\CompanyBusinessUnitsRestApiRepositoryInterface $companyBusinessUnitsRestApiRepository
     * @param \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Dependency\Facade\CompanyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterface $companyBusinessUnitFacade
     * @param \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Dependency\Plugin\CompanyBusinessUnitMapperPluginInterface[] $companyBusinessUnitMapperPlugins
     */
    public function __construct(
        CompanyBusinessUnitsRestApiRepositoryInterface $companyBusinessUnitsRestApiRepository,
        CompanyBusinessUnitsRestApiToCompanyBusinessUnitFacadeInterface $companyBusinessUnitFacade,
        array $companyBusinessUnitMapperPlugins
    ) {
        $this->companyBusinessUnitsRestApiRepository = $companyBusinessUnitsRestApiRepository;
        $this->companyBusinessUnitFacade = $companyBusinessUnitFacade;
        $this->companyBusinessUnitMapperPlugins = $companyBusinessUnitMapperPlugins;
    }

    /**
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    public function create(
        RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
    ): RestCompanyBusinessUnitsResponseTransfer {
        $companyBusinessUnitTransfer = new CompanyBusinessUnitTransfer();

        foreach ($this->companyBusinessUnitMapperPlugins as $companyBusinessUnitMapperPlugin) {
            $companyBusinessUnitTransfer = $companyBusinessUnitMapperPlugin->map(
                $restCompanyBusinessUnitsRequestAttributesTransfer,
                $companyBusinessUnitTransfer
            );
        }

        try {
            $companyBusinessUnitResponseTransfer = $this->companyBusinessUnitFacade->create($companyBusinessUnitTransfer);
        } catch (PropelException $e) {
            return $this->createCompanyBusinessUnitDataInvalidErrorResponse();
        }

        if (!$companyBusinessUnitResponseTransfer->getIsSuccessful()) {
            return $this->createCompanyBusinessUnitDataInvalidErrorResponse();
        }

        return $this->createCompanyBusinessUnitResponseTransfer(
            $companyBusinessUnitResponseTransfer->getCompanyBusinessUnitTransfer()
        );
    }

    /**
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestTransfer $restCompanyBusinessUnitsRequestTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    public function update(
        RestCompanyBusinessUnitsRequestTransfer $restCompanyBusinessUnitsRequestTransfer
    ): RestCompanyBusinessUnitsResponseTransfer {
        $companyBusinessUnitTransfer = $this->companyBusinessUnitsRestApiRepository
            ->findCompanyBusinessUnitByExternalReference($restCompanyBusinessUnitsRequestTransfer->getId());

        if ($companyBusinessUnitTransfer === null) {
            return $this->createCompanyBusinessUnitFailedToLoadErrorResponseTransfer();
        }

        foreach ($this->companyBusinessUnitMapperPlugins as $companyBusinessUnitMapperPlugin) {
            $companyBusinessUnitTransfer = $companyBusinessUnitMapperPlugin->map(
                $restCompanyBusinessUnitsRequestTransfer->getRestCompanyBusinessUnitsRequestAttributes(),
                $companyBusinessUnitTransfer
            );
        }

        try {
            $companyBusinessUnitResponseTransfer = $this->companyBusinessUnitFacade->update($companyBusinessUnitTransfer);
        } catch (PropelException $e) {
            return $this->createCompanyBusinessUnitDataInvalidErrorResponse();
        }

        if (!$companyBusinessUnitResponseTransfer->getIsSuccessful()) {
            return $this->createCompanyBusinessUnitDataInvalidErrorResponse();
        }

        return $this->createCompanyBusinessUnitResponseTransfer(
            $companyBusinessUnitResponseTransfer->getCompanyBusinessUnitTransfer()
        );
    }

    /**
     * @return \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    protected function createCompanyBusinessUnitDataInvalidErrorResponse(): RestCompanyBusinessUnitsResponseTransfer
    {
        $restCompanyBusinessUnitsErrorTransfer = new RestCompanyBusinessUnitsErrorTransfer();

        $restCompanyBusinessUnitsErrorTransfer->setStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->setCode(CompanyBusinessUnitsRestApiConfig::RESPONSE_CODE_COMPANY_BUSINESS_UNIT_DATA_INVALID)
            ->setDetail(CompanyBusinessUnitsRestApiConfig::RESPONSE_DETAILS_COMPANY_BUSINESS_UNIT_DATA_INVALID);

        $restCompanyBusinessUnitsResponseTransfer = new RestCompanyBusinessUnitsResponseTransfer();

        $restCompanyBusinessUnitsResponseTransfer->setIsSuccess(false)
            ->addError($restCompanyBusinessUnitsErrorTransfer);

        return $restCompanyBusinessUnitsResponseTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\RestCompanyBusinessUnitsResponseTransfer
     */
    protected function createCompanyBusinessUnitFailedToSaveErrorResponse(): RestCompanyBusinessUnitsResponseTransfer
    {
        $restCompanyBusinessUnitsErrorTransfer = new RestCompanyBusinessUnitsErrorTransfer();

        $restCompanyBusinessUnitsErrorTransfer->setStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->setCode(CompanyBusinessUnitsRestApiConfig::RESPONSE_CODE_COMPANY_BUSINESS_UNIT_FAILED_TO_SAVE)
            ->setDetail(CompanyBusinessUnitsRestApiConfig::RESPONSE_DETAILS_COMPANY_BUSINESS_UNIT_FAILED_TO_SAVE);

        $restCompanyBusinessUnitsResponseTransfer = new RestCompanyBusinessUnitsResponseTransfer();

        $restCompanyBusinessUnitsResponseTransfer->setIsSuccess(false)
            ->addError($restCompanyBusinessUnitsErrorTransfer);

        return $restCompanyBusinessUnitsResponseTransfer;
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
}
