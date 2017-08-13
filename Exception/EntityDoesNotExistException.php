<?php

namespace OutCloud\CommonBundle\Component;

/**
 * {@inheritDoc}
 */
class EntityDoesNotExistException extends GlobalException
{
    public const CODE = 1001;
    public const HTTP_CODE = 404;
    public const MESSAGE = 'Entity does not exist';
}

