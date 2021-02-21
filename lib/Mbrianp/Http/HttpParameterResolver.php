<?php

namespace Mbrianp\Component\Http;

use Mbrianp\Component\DIC\DIC;
use Mbrianp\Component\Kernel\ParameterResolver;
use ReflectionParameter;

class HttpParameterResolver implements ParameterResolver
{
    public function __construct(protected DIC $dependenciesContainer)
    {
    }

    public function supports(ReflectionParameter $parameter): bool
    {
        return Request::class == $parameter->getType()->getName();
    }

    public function resolve(): object
    {
        return $this->dependenciesContainer->getService('http.request');
    }
}