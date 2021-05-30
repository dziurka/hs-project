<?php

namespace Support\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self HTTP_CONTINUE()
 * @method static self HTTP_SWITCHING_PROTOCOLS()
 * @method static self HTTP_PROCESSING()
 * @method static self HTTP_EARLY_HINTS()
 * @method static self HTTP_OK()
 * @method static self HTTP_CREATED()
 * @method static self HTTP_ACCEPTED()
 * @method static self HTTP_NON_AUTHORITATIVE_INFORMATION()
 * @method static self HTTP_NO_CONTENT()
 * @method static self HTTP_RESET_CONTENT()
 * @method static self HTTP_PARTIAL_CONTENT()
 * @method static self HTTP_MULTI_STATUS()
 * @method static self HTTP_ALREADY_REPORTED()
 * @method static self HTTP_IM_USED()
 * @method static self HTTP_MULTIPLE_CHOICES()
 * @method static self HTTP_MOVED_PERMANENTLY()
 * @method static self HTTP_FOUND()
 * @method static self HTTP_SEE_OTHER()
 * @method static self HTTP_NOT_MODIFIED()
 * @method static self HTTP_USE_PROXY()
 * @method static self HTTP_RESERVED()
 * @method static self HTTP_TEMPORARY_REDIRECT()
 * @method static self HTTP_PERMANENTLY_REDIRECT()
 * @method static self HTTP_BAD_REQUEST()
 * @method static self HTTP_UNAUTHORIZED()
 * @method static self HTTP_PAYMENT_REQUIRED()
 * @method static self HTTP_FORBIDDEN()
 * @method static self HTTP_NOT_FOUND()
 * @method static self HTTP_METHOD_NOT_ALLOWED()
 * @method static self HTTP_NOT_ACCEPTABLE()
 * @method static self HTTP_PROXY_AUTHENTICATION_REQUIRED()
 * @method static self HTTP_REQUEST_TIMEOUT()
 * @method static self HTTP_CONFLICT()
 * @method static self HTTP_GONE()
 * @method static self HTTP_LENGTH_REQUIRED()
 * @method static self HTTP_PRECONDITION_FAILED()
 * @method static self HTTP_REQUEST_ENTITY_TOO_LARGE()
 * @method static self HTTP_REQUEST_URI_TOO_LONG()
 * @method static self HTTP_UNSUPPORTED_MEDIA_TYPE()
 * @method static self HTTP_REQUESTED_RANGE_NOT_SATISFIABLE()
 * @method static self HTTP_EXPECTATION_FAILED()
 * @method static self HTTP_I_AM_A_TEAPOT()
 * @method static self HTTP_MISDIRECTED_REQUEST()
 * @method static self HTTP_UNPROCESSABLE_ENTITY()
 * @method static self HTTP_LOCKED()
 * @method static self HTTP_FAILED_DEPENDENCY()
 * @method static self HTTP_TOO_EARLY()
 * @method static self HTTP_UPGRADE_REQUIRED()
 * @method static self HTTP_PRECONDITION_REQUIRED()
 * @method static self HTTP_TOO_MANY_REQUESTS()
 * @method static self HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE()
 * @method static self HTTP_UNAVAILABLE_FOR_LEGAL_REASONS()
 * @method static self HTTP_INTERNAL_SERVER_ERROR()
 * @method static self HTTP_NOT_IMPLEMENTED()
 * @method static self HTTP_BAD_GATEWAY()
 * @method static self HTTP_SERVICE_UNAVAILABLE()
 * @method static self HTTP_GATEWAY_TIMEOUT()
 * @method static self HTTP_VERSION_NOT_SUPPORTED()
 * @method static self HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL()
 * @method static self HTTP_INSUFFICIENT_STORAGE()
 * @method static self HTTP_LOOP_DETECTED()
 * @method static self HTTP_NOT_EXTENDED()
 * @method static self HTTP_NETWORK_AUTHENTICATION_REQUIRED()
 */
class HttpCodeEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'HTTP_CONTINUE' => 100,
            'HTTP_SWITCHING_PROTOCOLS' => 101,
            'HTTP_PROCESSING' => 102,
            'HTTP_EARLY_HINTS' => 103,
            'HTTP_OK' => 200,
            'HTTP_CREATED' => 201,
            'HTTP_ACCEPTED' => 202,
            'HTTP_NON_AUTHORITATIVE_INFORMATION' => 203,
            'HTTP_NO_CONTENT' => 204,
            'HTTP_RESET_CONTENT' => 205,
            'HTTP_PARTIAL_CONTENT' => 206,
            'HTTP_MULTI_STATUS' => 207,
            'HTTP_ALREADY_REPORTED' => 208,
            'HTTP_IM_USED' => 226,
            'HTTP_MULTIPLE_CHOICES' => 300,
            'HTTP_MOVED_PERMANENTLY' => 301,
            'HTTP_FOUND' => 302,
            'HTTP_SEE_OTHER' => 303,
            'HTTP_NOT_MODIFIED' => 304,
            'HTTP_USE_PROXY' => 305,
            'HTTP_RESERVED' => 306,
            'HTTP_TEMPORARY_REDIRECT' => 307,
            'HTTP_PERMANENTLY_REDIRECT' => 308,
            'HTTP_BAD_REQUEST' => 400,
            'HTTP_UNAUTHORIZED' => 401,
            'HTTP_PAYMENT_REQUIRED' => 402,
            'HTTP_FORBIDDEN' => 403,
            'HTTP_NOT_FOUND' => 404,
            'HTTP_METHOD_NOT_ALLOWED' => 405,
            'HTTP_NOT_ACCEPTABLE' => 406,
            'HTTP_PROXY_AUTHENTICATION_REQUIRED' => 407,
            'HTTP_REQUEST_TIMEOUT' => 408,
            'HTTP_CONFLICT' => 409,
            'HTTP_GONE' => 410,
            'HTTP_LENGTH_REQUIRED' => 411,
            'HTTP_PRECONDITION_FAILED' => 412,
            'HTTP_REQUEST_ENTITY_TOO_LARGE' => 413,
            'HTTP_REQUEST_URI_TOO_LONG' => 414,
            'HTTP_UNSUPPORTED_MEDIA_TYPE' => 415,
            'HTTP_REQUESTED_RANGE_NOT_SATISFIABLE' => 416,
            'HTTP_EXPECTATION_FAILED' => 417,
            'HTTP_I_AM_A_TEAPOT' => 418,
            'HTTP_MISDIRECTED_REQUEST' => 421,
            'HTTP_UNPROCESSABLE_ENTITY' => 422,
            'HTTP_LOCKED' => 423,
            'HTTP_FAILED_DEPENDENCY' => 424,
            'HTTP_TOO_EARLY' => 425,
            'HTTP_UPGRADE_REQUIRED' => 426,
            'HTTP_PRECONDITION_REQUIRED' => 428,
            'HTTP_TOO_MANY_REQUESTS' => 429,
            'HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE' => 431,
            'HTTP_UNAVAILABLE_FOR_LEGAL_REASONS' => 451,
            'HTTP_INTERNAL_SERVER_ERROR' => 500,
            'HTTP_NOT_IMPLEMENTED' => 501,
            'HTTP_BAD_GATEWAY' => 502,
            'HTTP_SERVICE_UNAVAILABLE' => 503,
            'HTTP_GATEWAY_TIMEOUT' => 504,
            'HTTP_VERSION_NOT_SUPPORTED' => 505,
            'HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL' => 506,
            'HTTP_INSUFFICIENT_STORAGE' => 507,
            'HTTP_LOOP_DETECTED' => 508,
            'HTTP_NOT_EXTENDED' => 510,
            'HTTP_NETWORK_AUTHENTICATION_REQUIRED' => 511,
        ];
    }
}
