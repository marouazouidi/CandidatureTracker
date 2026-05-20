<?php

namespace App\Providers;

use App\Models\Candidature;
use App\Models\Interview;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('dashboard', function ($view) {
            $user = Auth::user();

            $activeCount = $user?->candidatures()->whereNull('deleted_at')->count() ?? 0;

            $upcomingInterviews = Interview::whereHas('candidature', function ($q) use ($user) {
                $q->where('user_id', $user?->id);
            })->where('interview_date', '>=', Carbon::today())->count();

            $offersReceived = $user?->candidatures()
                ->whereNull('deleted_at')
                ->where('status', 'offer_received')
                ->count() ?? 0;

            $recentCandidatures = $user?->candidatures()
                ->whereNull('deleted_at')
                ->latest()
                ->take(5)
                ->get() ?? collect();

            $view->with(compact('activeCount', 'upcomingInterviews', 'offersReceived', 'recentCandidatures'));
        });
    }
}