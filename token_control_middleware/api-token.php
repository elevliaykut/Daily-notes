<?php

public function handle($request, Closure $next)
    {
        $auth = $request->header('Authorization');

        if ($auth) {

            $token = str_replace('Bearer ', '', $auth);

            if (!$token) {
                return response()->json([
                    'success' => false,
                    'message' => 'Bearer Token Not Found!'
                ], 401);
            }

            $user = UserLogin::where('token', $token)->first();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid Bearer Token!'
                ], 401);
            }
            auth()->setUser($user);
            return $next($request);
        }

        return response()->json([
            'success' => false,
            'message' => 'Enter Token Value',
        ],401);
    }

?>