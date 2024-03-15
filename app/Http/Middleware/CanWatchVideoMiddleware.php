<?php

namespace App\Http\Middleware;

use App\Http\Controllers\ConstController;
use App\Models\ArvanVideo;
use App\Models\Course;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CanWatchVideoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (!$request->videoId)
            abort(404);


        $userId = Auth::id();

        $video = ArvanVideo::query()->where('id', $request->videoId)->first();

        #User can watch video if who has watched it before
        $existsWatchLog = ArvanVideo::query()->where('id', $request->videoId)->whereHas('watchLogs', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->exists();

        $tasks_dosnt_completed = $video->course->tasks()->isMine()->whereDoesntHave('answers', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();


        if ($existsWatchLog or $video->is_free)
            return $next($request);

        if ($tasks_dosnt_completed >= ConstController::limitDosntCompletedTask)
            return redirect('/student/tasks');


        return $next($request);
    }
}
