<?php

use Flugg\Responder\Contracts\Pagination\CursorPaginator;
use Flugg\Responder\Contracts\Pagination\Paginator;
use Flugg\Responder\Contracts\Validation\Validator;
use Flugg\Responder\Pagination\IlluminatePaginatorAdapter;
use Flugg\Responder\Validation\IlluminateValidatorAdapter;

return [

    /*
    |--------------------------------------------------------------------------
    | Response Formatter
    |--------------------------------------------------------------------------
    |
    | The response formatter is used to format the structure of the response
    | data of both success- and error responses. You may override this on
    | a per-response basis or set to null to simply disable formatting.
    |
    */

    'formatter' => \Flugg\Responder\Http\Formatters\SimpleFormatter::class,

    /*
    |--------------------------------------------------------------------------
    | Response Decorators
    |--------------------------------------------------------------------------
    |
    | Response decorators are used to decorate both your success- and error
    | responses. These are typically used for adding headers or altering
    | the response data and are executed after the response formatter.
    |
    */

    'decorators' => [
        // \Flugg\Responder\Http\Decorators\PrettyPrintDecorator::class,
        // \Flugg\Responder\Http\Decorators\EscapeHtmlDecorator::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Adapters
    |--------------------------------------------------------------------------
    |
    | The Laravel Responder package uses adapter classes for pagination and
    | validation, allowing you to use other implementations. The package
    | doesn't include an adapter for cursor pagination out of the box.
    |
    */

    'adapters' => [
        Paginator::class => [
            Illuminate\Contracts\Pagination\LengthAwarePaginator::class => IlluminatePaginatorAdapter::class,
        ],
        CursorPaginator::class => [
            //
        ],
        Validator::class => [
            \Illuminate\Contracts\Validation\Validator::class => IlluminateValidatorAdapter::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Exceptions
    |--------------------------------------------------------------------------
    |
    | A map of exceptions that will be converted to JSON error responses when
    | the exception handler uses the [ConvertsExceptions] trait. Responses
    | with a status code of 5xx are ignored if debug mode is turned on.
    |
    */

    'exceptions' => [
        \Illuminate\Auth\AuthenticationException::class => [
            'code' => 'unauthenticated',
            'status' => 401,
        ],
        \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException::class => [
            'code' => 'unauthorized',
            'status' => 403,
        ],
        \Symfony\Component\HttpKernel\Exception\NotFoundHttpException::class => [
            'code' => 'page_not_found',
            'status' => 404,
        ],
        \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException::class => [
            'code' => 'method_not_allowed',
            'status' => 405,
        ],
        \Illuminate\Database\Eloquent\RelationNotFoundException::class => [
            'code' => 'relation_not_found',
            'status' => 422,
        ],
        \Illuminate\Validation\ValidationException::class => [
            'code' => 'validation_failed',
            'status' => 422,
        ],
        \Exception::class => [
            'code' => 'server_error',
            'status' => 500,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Error Messages
    |--------------------------------------------------------------------------
    |
    | Response decorators are used to decorate both your success- and error
    | responses. A decorator can be disabled by removing it from the list
    | below. You may additionally add your own decorators to the list.
    |
    */

    'error_messages' => [
        'unauthenticated' => 'You are not authenticated',
        'unauthorized' => 'You are not authorized',
        'page_not_found' => 'The requested page was not found',
        'method_not_allowed' => 'The method is not allowed for this request',
        'relation_not_found' => 'The requested relation was not found',
        'validation_failed' => 'The given data was invalid',
        'server_error' => 'Something went wrong',
    ],
];
