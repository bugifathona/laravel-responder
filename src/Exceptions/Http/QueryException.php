<?php

namespace Flugg\Responder\Exceptions\Http;

use Illuminate\Database\QueryException as BaseQueryException;

/**
 * An exception thrown whan a page is not found.
 *
 * @package flugger/laravel-responder
 * @author  Alexander Tømmerås <flugged@gmail.com>
 * @license The MIT License
 */
class QueryException extends HttpException
{
    /**
     * An HTTP status code.
     *
     * @var int
     */
    protected $status = 500;

    /**
     * An error code.
     *
     * @var string|null
     */
    protected $errorCode = 'query_error';

    protected $exception;

    // public function getData(Throwable $exception)
    // {
    //     if ($exception instanceof BaseQueryException) {
    //         $exception = 'nganu';
    //     }

    //     dd($exception);

    //     return $exception;
    // }

    public function data()
    {

        return ['description' => 'nganu'];
    }

}
