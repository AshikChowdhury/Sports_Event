<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Comment\Comment;
use App\Models\Match\Match;
use App\Models\Post\Post;
use App\Models\TransEvent\TransEvent;
use App\Repositories\Backend\Match\MatchRepository;
use App\Repositories\Backend\Team\TeamRepository;
use App\Repositories\Backend\TransEvent\TransEventRepository;
use App\Repositories\Frontend\Comment\CommentRepository;
use App\Repositories\Frontend\Post\PostRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    private $repository,
        $transEventRepository,
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
        CommentRepository $repository,
        TransEventRepository $transEventRepository
    )
    {
        $this->repository = $repository;
        $this->transEventRepository = $transEventRepository;

        $this->module_action = "";
        $this->module_parent = "Summit";
        $this->module_name = 'comments';
        $this->module_icon = 'mdi-hospital-building';

        $this->module_route = "frontend." . $this->module_name;
//        $this->module_view = "backend.setup." . $this->module_name;
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

    public function store($event, Request $request)
    {
        $module_name_singular = str_singular($this->module_name);
        $module_route = $this->module_route;

        $$module_name_singular = $this->repository->create([
            'data' => $request->except(['_token']),
        ]);

//        \Log::info(ucfirst($module_action) . " '$module_name': '" . $request->name . ", ID:" . $request->id . " ' by User:" . $this->user->name);
        return redirect()->route("frontend.event_detail", $event)->withFlashSuccess('Record successfully saved');
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

    public function destroy($event, $id)
    {
        Comment::findOrFail($id)->delete();

        return redirect()->back()->withFlashSuccess(__('alerts.backend.users.deleted'));
    }

}

