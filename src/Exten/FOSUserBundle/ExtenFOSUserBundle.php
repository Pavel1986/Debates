<?php

namespace Exten\FOSUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ExtenFOSUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
