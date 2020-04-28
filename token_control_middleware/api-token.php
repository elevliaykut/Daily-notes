<?php

namespace App\Http\Middleware;

use App\Models\UserLogin;
use Closure;

class ApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $auth = $request->header('Authorization');

        if ($auth) {

            $token = str_replace('Bearer ', '', $auth);

            if (!$token) {
                return response()->json([
                    'error_message' => 'Unauthorized',
                    'message' => trans('errors.1111')
                ], 401);
            }

            $user = UserLogin::where('token', $token)->first();

            if (!$user) {
                return response()->json([
                    'error_message' => 'Unauthorized',
                    'message' => trans('errors.1112')
                ], 401);
            }

            if (!is_token_active($user->token_expiry)) {
                $user->token = generate_token();
            }

            $user->token_expiry = generate_token_expiry();
            $user->save();

            auth()->setUser($user);

            return $next($request);
        }

        return response()->json([
            'error_message' => 'Unauthorized',
            'message' => trans('errors.1113'),
        ], 401);
    }
}
