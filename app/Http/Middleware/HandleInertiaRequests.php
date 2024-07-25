<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth.user' => fn () => $request->user()?->only('id', 'name'),
            'locale' => fn () => session('locale', 'en'),
            'allLanguages' => fn () => cache()->get(
                'allLanguages',
                cache()->remember('allLanguages', (60 * 60 * 24), function () {
                    return Language::pluck('name', 'locale')->toArray();
                })
            ),
            'permissions' => json_decode(auth()->check() ? auth()->user()->jsPermissions() : '{}', true),
        ];
    }
}
