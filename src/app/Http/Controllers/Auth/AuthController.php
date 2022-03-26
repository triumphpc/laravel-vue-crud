<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    /**
     * Login handler
     *
     * @param Request $request Request object
     *
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse {
        $credentials = $this->credentials($request);
        $token = $this->guard()->attempt($credentials, true);

        if ($token) {
            return response()->json(["status" => "success"])->header("Authorization", Auth::user()->id);
        }

        return response()->json(["error" => "login_error"], 401);
    }

    /**
     * Auth guard
     *
     * @return Guard|StatefulGuard
     */
    private function guard(): Guard|StatefulGuard {
        return Auth::guard();
    }

	/**
	 * Get the needed authorization credentials from the request.
	 *
	 * @param Request $request
	 * @return array
	 */
	protected function credentials(Request $request): array {
		return $request->only("name", "password");
	}

    /**
     * Refresh auth user
     *
     * @return JsonResponse
     */

    public function refresh(): JsonResponse {
        $user = Auth::guard()->user();
        try {
            if ($user instanceof User) {
                return response()
                    ->json(["status" => "successs"])
                    ->header("Authorization", Auth::user()->id);
            }
        } catch (\Exception $ex) {
            // Nothing

        }

        return response()->json(["error" => "refresh_token_error"], 401);
    }

    /**
     * Get user session info
     *
     * @return JsonResponse
     */
    public function user(): JsonResponse {
        $user = User::select([
            User::FIELD_ID,
            User::FIELD_NAME,
        ])->find(Auth::user()->id);

        return response()->json([
            "status" => "success",
            "data" => $user
        ]);
    }
}
