<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Match\Match;
use App\Models\Post\Post;
use App\Models\Schedule\Schedule;
use App\Models\Team\Team;
use App\Models\TransEvent\TransEvent;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $events = TransEvent::orderBy('id', 'desc')->where('status',1)->with('schedule')->get();

        return view('frontend.index', compact('events', $events));
    }

    public function show(TransEvent $event)
    {
        $schedules = Schedule::all()->where('event_id', $event->id);

        $matches = Match::all()->where('event_id', $event->id);

        $posts = Post::orderBy('created_at','desc')
            ->where('event_id', $event->id)
            ->where('status', 1)
            ->with('user')
            ->with(['comments' =>function ($q){
                return $q->latest()->where('status', 1);
            }])
            ->get();

        $team_sponsor = $event->load(['team', 'sponsor']);

        return view('frontend.event_detail', compact(
            'event', $event,
            'schedules',$schedules,
            'team_sponsor',$team_sponsor,
            'posts', $posts,
            'matches', $matches)
        );
    }

    public function show_team(TransEvent $event, Team $team)
    {
        $team_member = $team->load('members');

        $posts = Post::orderBy('created_at','desc')
            ->where('event_id', $event->id)
            ->with('user')
            ->with(['comments' =>function ($q){
                return $q->latest();
            }])
            ->get();

        $team_sponsor = $event->load(['team', 'sponsor']);

        return view('frontend.team_detail', compact(
                'team', $team,
                'event', $event,
                'team_member', $team_member,
                'team_sponsor',$team_sponsor,
                'posts', $posts)
        );
    }
}
