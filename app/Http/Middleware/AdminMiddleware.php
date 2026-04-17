<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * معالجة الطلب الوارد.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. التحقق من أن المستخدم مسجل دخول
        // 2. التحقق من أن قيمة is_admin تساوي 1
        if (auth()->check() && auth()->user()->is_admin == 1) {
            return $next($request);
        }

        // إذا لم يكن مديراً، يتم تحويله للرئيسية مع رسالة تنبيه
        return redirect('/')->with('error', 'عذراً، لا تملك صلاحيات دخول لوحة الإدارة.');
    }
}