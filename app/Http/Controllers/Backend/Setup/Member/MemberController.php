<?php

namespace App\Http\Controllers\Backend\Setup\Member;

use App\Models\Member\Member;
use App\Repositories\Backend\Member\MemberRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    private $repository, $module_parent, $module_name, $module_icon, $module_action, $module_route, $module_view;

    /**
     * MemberController constructor.
     * @param $repository
     */
    public function __construct(MemberRepository $repository)
    {
        $this->repository = $repository;

        $this->module_action = "";
        $this->module_parent = "Summit";
        $this->module_name = 'members';
        $this->module_icon = 'mdi-hospital-building';

        $this->module_route = "admin.setup." . $this->module_name;
        $this->module_view = "backend.setup." . $this->module_name;
    }

    public function index($team)
    {
        $module_parent = $this->module_parent;
        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);
        $module_icon = $this->module_icon;
        $module_action = "Index";
        $module_route = $this->module_route;
        $module_view = $this->module_view;

        $page_heading = "All ".ucfirst($this->module_name);

//        $$module_name = $this->repository->getAll($team);
        $$module_name = Member::orderBy('id', 'desc')
                        ->where('team_id', $team)
                        ->get();
//        dd($$module_name);
        return view($module_view . '.index',
            compact('module_name', "$module_name", "module_name_singular", 'module_parent','module_icon', 'page_heading', 'module_action', 'module_view', 'module_route', 'team', $team));
    }

    public function create($team)
    {
        $module_parent = $this->module_parent;
        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);
        $module_icon = $this->module_icon;
        $module_action = "Create";
        $module_route = $this->module_route;
        $module_view = $this->module_view;

        $page_heading = "Create New Member ";

        return view($module_view . ".create",
            compact('module_name', "module_name_singular", 'module_parent', 'module_icon', 'page_heading', 'module_action', 'module_view', 'module_route', 'team', $team));
    }

    public function store(Request $request, $team)
    {
        $module_name_singular = str_singular($this->module_name);
        $module_route = $this->module_route;

        $$module_name_singular = $this->repository->create([
            'data' => $request->except(['_token']),
        ]);

//        \Log::info(ucfirst($module_action) . " '$module_name': '" . $request->name . ", ID:" . $request->id . " ' by User:" . $this->user->name);
        return redirect()->route($module_route . ".index", $team)->withFlashSuccess('Record successfully saved');
    }

    public function show($team_id, Member $member)
    {
        $module_parent = $this->module_parent;
        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);
        $module_icon = $this->module_icon;
        $module_action = "Show";
        $module_route = $this->module_route;
        $module_view = $this->module_view;

        $page_heading = "Member Details";

        return view($module_view.'.show',  compact('module_name', "module_name_singular", 'module_parent', 'module_icon', 'page_heading', 'module_action', 'module_view', 'module_route'))
            ->with('member', $member);
    }

    public function edit($team_id, Member $member)
    {
        $module_parent = $this->module_parent;
        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);
        $module_icon = $this->module_icon;
        $module_action = "Update";
        $module_route = $this->module_route;
        $module_view = $this->module_view;

        $page_heading = "Member Update";

        $module_name_singular = $member;

        return view($module_view.'.edit',  compact('module_name', "module_name_singular", 'module_parent', 'module_icon', 'page_heading', 'module_action', 'module_view', 'module_route', 'team_id', $team_id));
    }

    public function update($team_id, Member $member, Request $request)
    {
        $module_name_singular = str_singular($this->module_name);
        $module_route = $this->module_route;

        $$module_name_singular = $this->repository->update($member, [
            'data' => $request->except(['_token']),
        ]);

//        \Log::info(ucfirst($module_action) . " '$module_name': '" . $request->name . ", ID:" . $request->id . " ' by User:" . $this->user->name);
        return redirect()->route($module_route . ".index", $team_id)->withFlashSuccess('Record successfully updated');
    }

}
