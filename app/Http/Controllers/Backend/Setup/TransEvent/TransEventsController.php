<?php

namespace App\Http\Controllers\Backend\Setup\TransEvent;

use App\Models\Sponsor\Sponsor;
use App\Models\Team\Team;
use App\Models\TransEvent\TransEvent;
use App\Repositories\Backend\EventSchedule\EventScheduleRepository;
use App\Repositories\Backend\TeamSponsor\TeamSponsorRepository;
use App\Repositories\Backend\TransEvent\TransEventRepository;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransEventsController extends Controller
{
    private $repository, $module_parent, $module_name, $module_icon, $module_action, $module_route, $module_view;

    /**
     * TransEventsController constructor.
     * @param $repository
     */
    public function __construct(TransEventRepository $repository)
    {
        $this->repository = $repository;

        $this->module_action = "";
        $this->module_parent = "Summit";
        $this->module_name = 'events';
        $this->module_icon = 'mdi-hospital-building';

        $this->module_route = "admin.setup." . $this->module_name;
        $this->module_view = "backend.setup." . $this->module_name;
    }

    public function index()
    {
        $module_parent = $this->module_parent;
        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);
        $module_icon = $this->module_icon;
        $module_action = "Index";
        $module_route = $this->module_route;
        $module_view = $this->module_view;

        $page_heading = "All ".ucfirst($this->module_name);

        $$module_name = $this->repository->getAll();

        return view($module_view . ".index",
            compact('module_name', "$module_name", "module_name_singular", 'module_parent','module_icon', 'page_heading', 'module_action', 'module_view', 'module_route'));
    }

    public function create()
    {
        $module_parent = $this->module_parent;
        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);
        $module_icon = $this->module_icon;
        $module_action = "Create";
        $module_route = $this->module_route;
        $module_view = $this->module_view;

        $page_heading = "Create New Event";

        return view($module_view . ".create",
            compact('module_name', "module_name_singular", 'module_parent', 'module_icon', 'page_heading', 'module_action', 'module_view', 'module_route'));
    }

    public function store(Request $request)
    {
        $module_name_singular = str_singular($this->module_name);
        $module_route = $this->module_route;

        $$module_name_singular = $this->repository->create([
            'data' => $request->except(['_token']),
        ]);

//        \Log::info(ucfirst($module_action) . " '$module_name': '" . $request->name . ", ID:" . $request->id . " ' by User:" . $this->user->name);
        return redirect()->route($module_route . ".index")->withFlashSuccess('Record successfully saved');
    }

    public function show(TransEvent $event)
    {
        $module_parent = $this->module_parent;
        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);
        $module_icon = $this->module_icon;
        $module_action = "Show";
        $module_route = $this->module_route;
        $module_view = $this->module_view;

        $page_heading = "Details";

        return view($module_view.'.show',  compact('module_name','module_name_singular','module_parent', 'module_icon', 'page_heading', 'module_action', 'module_view', 'module_route'))
            ->with('event', $event->load('schedule'));
    }

    public function edit(TransEvent $event)
    {
        $module_parent = $this->module_parent;
        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);
        $module_icon = $this->module_icon;
        $module_action = "Update";
        $module_route = $this->module_route;
        $module_view = $this->module_view;

        $page_heading = "Event Update";

        return view($module_view.'.edit',  compact('module_name', "module_name_singular", 'module_parent', 'module_icon', 'page_heading', 'module_action', 'module_view', 'module_route'))
            ->with('event', $event);
    }

    public function schedule(TransEvent $event)
    {
        $module_parent = $this->module_parent;
        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);
        $module_icon = $this->module_icon;
        $module_route = $this->module_route;
        $module_view = $this->module_view;

        $page_heading = "Schedule Create";

        $start_date = Carbon::parse($event->start_date);
        $end_date = Carbon::parse($event->end_date);


        $interval = CarbonInterval::createFromDateString('1 day');
        $dates = new CarbonPeriod($start_date, $interval, $end_date);

        return view($module_view.'.schedule_create',  compact('module_name', "module_name_singular", 'module_parent', 'module_icon', 'page_heading', 'module_view', 'module_route'))
            ->with('event', $event)
            ->with('dates', $dates);
    }

    public function team_sponsor(TransEvent $event)
    {
        $module_parent = $this->module_parent;
        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);
        $module_icon = $this->module_icon;
        $module_route = $this->module_route;
        $module_view = $this->module_view;

        $page_heading = "Add Team and Sponsor";

        $teams = Team::pluck('name', 'id')->all();
        $sponsors = Sponsor::pluck('name', 'id')->all();


        return view($module_view.'.team_sponsor_add',  compact('module_name', "module_name_singular", 'module_parent', 'module_icon', 'page_heading', 'module_view', 'module_route', 'teams', $teams, 'sponsors', $sponsors))
            ->with('event', $event);
    }

    public function store_schedule(Request $request, TransEvent $event, EventScheduleRepository $repository)
    {
        $module_name_singular = str_singular($this->module_name);
        $module_route = $this->module_route;

        $$module_name_singular = $repository->create([
            'data' => $request->except(['_token']),
            'event' => $event
        ]);

//        \Log::info(ucfirst($module_action) . " '$module_name': '" . $request->name . ", ID:" . $request->id . " ' by User:" . $this->user->name);
        return redirect()->route($module_route . ".index")->withFlashSuccess('Record successfully saved');
    }

    public function store_team_sponsor(Request $request, $event, TeamSponsorRepository $repository)
    {
        $module_name_singular = str_singular($this->module_name);
        $module_route = $this->module_route;

        $$module_name_singular = $repository->create([
            'data' => $request->except(['_token']),
            'event' => $event
        ]);

//        \Log::info(ucfirst($module_action) . " '$module_name': '" . $request->name . ", ID:" . $request->id . " ' by User:" . $this->user->name);
        return redirect()->route($module_route . ".index")->withFlashSuccess('Record successfully saved');
    }


    public function update(TransEvent $event, Request $request)
    {
        $module_name_singular = str_singular($this->module_name);
        $module_route = $this->module_route;

        $$module_name_singular = $this->repository->update($event, [
            'data' => $request->except(['_token']),
        ]);

//        \Log::info(ucfirst($module_action) . " '$module_name': '" . $request->name . ", ID:" . $request->id . " ' by User:" . $this->user->name);
        return redirect()->route($module_route . ".index")->withFlashSuccess('Record successfully updated');
    }

}
