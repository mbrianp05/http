<?php

namespace Mbrianp\Component\Http;

use Mbrianp\Component\DIC\DependenciesDefinitionInterface;
use Mbrianp\Component\DIC\DIC;
use Mbrianp\Component\DIC\Service;

class HttpDependenciesDefinition implements DependenciesDefinitionInterface
{
    public function __construct(DIC $dependenciesContainer, array $config)
    {
    }

    public function getServices(): array
    {
        $get = new ParamStack($_GET);
        $post = new ParamStack($_POST);

        $params = [$get, $post, $_SERVER['PATH_INFO'] ?? '/', $_SERVER['REQUEST_METHOD']];

        return [new Service('http.request', Request::class, $params)];
    }
}