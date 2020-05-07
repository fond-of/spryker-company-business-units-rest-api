<?php

namespace FondOfSpryker\Glue\CompanyBusinessUnitsRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Client\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiClientInterface;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsMapper;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsReader;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\CompanyBusinessUnits\CompanyBusinessUnitsResourceRelationshipExpander;
use FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\Processor\Validation\RestApiError;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;

class CompanyBusinessUnitsRestApiFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiFactory
     */
    protected $companyBusinessUnitsRestApiFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiClientInterface
     */
    protected $companyBusinessUnitsRestApiClientInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
     */
    protected $restResourceBuilderInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyBusinessUnitsRestApiClientInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restResourceBuilderInterfaceMock = $this->getMockBuilder(RestResourceBuilderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitsRestApiFactory = new class (
            $this->companyBusinessUnitsRestApiClientInterfaceMock,
            $this->restResourceBuilderInterfaceMock
        ) extends CompanyBusinessUnitsRestApiFactory {
            /**
             * @var \FondOfSpryker\Client\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiClientInterface
             */
            protected $companyBusinessUnitsRestApiClient;

            /**
             * @var \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
             */
            protected $restResourceBuilder;

            /**
             * @param \FondOfSpryker\Client\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiClientInterface $companyBusinessUnitsRestApiClient
             * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
             */
            public function __construct(
                CompanyBusinessUnitsRestApiClientInterface $companyBusinessUnitsRestApiClient,
                RestResourceBuilderInterface $restResourceBuilder
            ) {
                $this->companyBusinessUnitsRestApiClient = $companyBusinessUnitsRestApiClient;
                $this->restResourceBuilder = $restResourceBuilder;
            }

            /**
             * @return \FondOfSpryker\Client\CompanyBusinessUnitsRestApi\CompanyBusinessUnitsRestApiClientInterface
             */
            public function getClient(): CompanyBusinessUnitsRestApiClientInterface
            {
                return $this->companyBusinessUnitsRestApiClient;
            }

            /**
             * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
             */
            public function getResourceBuilder(): RestResourceBuilderInterface
            {
                return $this->restResourceBuilder;
            }
        };
    }

    /**
     * @return void
     */
    public function testCreateCompanyBusinessUnitsReader(): void
    {
        $this->assertInstanceOf(
            CompanyBusinessUnitsReader::class,
            $this->companyBusinessUnitsRestApiFactory->createCompanyBusinessUnitsReader()
        );
    }

    /**
     * @return void
     */
    public function testCreateRestApiError(): void
    {
        $this->assertInstanceOf(
            RestApiError::class,
            $this->companyBusinessUnitsRestApiFactory->createRestApiError()
        );
    }

    /**
     * @return void
     */
    public function testCreateCompanyBusinessUnitsResourceRelationshipExpander(): void
    {
        $this->assertInstanceOf(
            CompanyBusinessUnitsResourceRelationshipExpander::class,
            $this->companyBusinessUnitsRestApiFactory->createCompanyBusinessUnitsResourceRelationshipExpander()
        );
    }

    /**
     * @return void
     */
    public function testCreateCompanyBusinessUnitsMapper(): void
    {
        $this->assertInstanceOf(
            CompanyBusinessUnitsMapper::class,
            $this->companyBusinessUnitsRestApiFactory->createCompanyBusinessUnitsMapper()
        );
    }
}
