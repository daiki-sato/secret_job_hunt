<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;

class CheckRole
{
    public function handle($request, Closure $next, string $role)
    {
        $user = $request->user();
        if (!$user->hasRole($role)) {
            $role_id = $user->role_id;

            if ($role_id === Role::getIntervieweeId() || $role_id === Role::getSolverId()) {
                return redirect()
                    ->route('home')
                    ->with([
                        'flush.message' => 'ページ閲覧権限がありません',
                        'flush.alert_type' => 'danger',
                    ]);
            } else {
                return redirect()
                    ->route('admin')
                    ->with([
                        'flush.message' => 'ページ閲覧権限がありません',
                        'flush.alert_type' => 'danger',
                    ]);
            }
        }
        return $next($request);
    }
}