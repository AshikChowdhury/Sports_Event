<?php

namespace App\Http\Controllers\Backend\Setup\Match;

use App\Models\Match\Match;
use App\Repositories\Backend\Match\MatchRepository;
use App\Repositories\Backend\Team\TeamRepository;
use App\Repositories\Backend\TransEvent\TransEventRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatchController extends Controller
{
    private $repository,
            $transEventRepository,
            $teamRepository,
            $module_parent,
            $module_name,
            $module_icon,
            $module_action,
            $module_route,
            $module_view;

    /**
     * MatchRepository constructor.
     * @param MatchRepository $repository
     * @param TransEventRepository $transEventRepository
     * @param TeamRepository $teamRepository
     */
    public function __construct(
        MatchRepository $repository,
        TransEventRepository $transEventRepository,
        TeamRepository $teamRepository
    )
    {
        $this->repository = $repository;
        $this->transEventRepository = $transEventRepository;
        $this->teamRepository = $teamRepository;

        $this->module_action = "";
        $this->module_parent = "Summit";
        $this->module_name = 'matches';
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

        $page_heading = "Create New Match";

        $trans_events = $this->transEventRepository->getAll()->pluck('name', 'id');
        $teams = $this->teamRepository->getAll()->pluck('name', 'id');

        return view($module_view . ".create",
            compact('module_name', "module_name_singular", 'module_parent', 'module_icon', 'page_heading', 'module_action', 'module_view', 'module_route'))
            ->with('trans_events', $trans_events)
            ->with('teams', $teams);
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

    public function show(Match $match)
    {
        $module_parent = $this->module_parent;
        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);
        $module_icon = $this->module_icon;
        $module_action = "Show";
        $module_route = $this->module_route;
        $module_view = $this->module_view;

        $page_heading = "Match Details";

        $module_name_singular = $match->load('transevent','team_1', 'team_2');
//        dd($module_name_singular);

        return view($module_view.'.show',  compact('module_name', "module_name_singular", 'module_parent', 'module_icon', 'page_heading', 'module_action', 'module_view', 'module_route'));
    }

    public function edit(Match $match)
    {
        $module_parent = $this->module_parent;
        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);
        $module_icon = $this->module_icon;
        $module_action = "Update";
        $module_route = $this->module_route;
        $module_view = $this->module_view;

        $page_heading = "Match Update";

        $module_name_singular = $match;

        $trans_events = $this->transEventRepository->getAll()->pluck('name', 'id');
        $teams = $this->teamRepository->getAll()->pluck('name', 'id');

        return view($module_view.'.edit',  compact('module_name', "module_name_singular", 'module_parent', 'module_icon', 'page_heading', 'module_action', 'module_view', 'module_route'))
            ->with('trans_events', $trans_events)
            ->with('teams', $teams);
    }

    public function update(Match $match, Request $request)
    {
        $module_name_singular = str_singular($this->module_name);
        $module_route = $this->module_route;

        $$module_name_singular = $this->repository->update($match, [
            'data' => $request->except(['_token']),
        ]);

//        \Log::info(ucfirst($module_action) . " '$module_name': '" . $request->name . ", ID:" . $request->id . " ' by User:" . $this->user->name);
        return redirect()->route($module_route . ".index")->withFlashSuccess('Record successfully updated');
    }

}

