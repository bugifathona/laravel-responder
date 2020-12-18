<?php

namespace Flugg\Responder\Exceptions\Http;

/**
 * An exception thrown whan a page is not found.
 *
 * @package flugger/laravel-responder
 * @author  Alexander Tømmerås <flugged@gmail.com>
 * @license The MIT License
 */
class ResourceNotFoundException extends HttpException
{
    /**
     * An HTTP status code.
     *
     * @var int
     */
    protected $status = 404;

    /**
     * An error code.
     *
     * @var string|null
     */
    protected $errorCode = 'resource_not_found';
}