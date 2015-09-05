<?php
namespace Inbep\Silex\Provider;

use Silex\Application;
use Silex\WebTestCase;
use Silex\Provider\FormServiceProvider;
use Lexik\Bundle\FormFilterBundle\Filter\FilterBuilderUpdater;

class FormFilterServiceProviderTest extends WebTestCase
{
    /**
     * @test
     * @expectedException \LogicException
     */
    public function shouldReturnLogicException()
    {
        $app = $this->createApplication();
        $app->register(new FormFilterServiceProvider());
    }

    /**
     * @test
     */
    public function register()
    {
        $app = $this->createApplication();
        $app->register(new FormServiceProvider());
        $app->register(new FormFilterServiceProvider());

        $this->assertInstanceOf(FilterBuilderUpdater::class, $app['form_filter']);
    }

    public function createApplication()
    {
        $app = new Application();
        $app['debug'] = true;

        return $app;
    }
}
