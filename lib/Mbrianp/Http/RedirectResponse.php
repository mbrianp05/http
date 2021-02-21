<?php

namespace Mbrianp\Component\Http;

class RedirectResponse extends Response
{
    public function __construct(string $url)
    {
        parent::__construct(\sprintf('Redirecting to %s', $url), 307, headers: ['location' => $url]);
    }
}