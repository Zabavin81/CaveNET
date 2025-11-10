<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PostException extends Exception
{

    public static function storeFailed($exception) {

        return response([
            'message' => 'post.store_failed',
        ], ResponseAlias::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Report the exception.
     */
    public function report(): void
    {
        //
    }

    /**
     * Render the exception as an HTTP response.
     */

}
