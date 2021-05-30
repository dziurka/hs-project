<?php

namespace App\API\Auth\Controllers;

use App\API\Controller;
use Illuminate\Http\Response;

class CsrfCookieController extends Controller
{
    public function show(): Response
    {
        return new Response('', Response::HTTP_NO_CONTENT);
    }
}
