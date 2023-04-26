<?php

namespace PwaBlui\Controllers\WebAuthn;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Laragear\WebAuthn\Http\Requests\AssertedRequest;
use Laragear\WebAuthn\Http\Requests\AssertionRequest;
use function response;

class WebAuthnLoginController
{
    /**
     * Returns the challenge to assertion.
     */
    public function options(AssertionRequest $request): Responsable
    {
        return $request->secureLogin()->toVerify($request->validate(['username' => 'sometimes|string']));
    }

    /**
     * Log the user in.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(AssertedRequest $request): Response
    {
        return response()->noContent($request->login() ? 204 : 422);
    }
}
