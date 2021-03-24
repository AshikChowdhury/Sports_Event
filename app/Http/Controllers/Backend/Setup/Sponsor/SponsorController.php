<?php

namespace App\Http\Controllers\Backend\Setup\Sponsor;

use App\Models\Sponsor\Sponsor;
use App\Repositories\Backend\Sponsor\SponsorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SponsorController extends Controller
{
    private $repository, $module_parent, $module_name, $module_icon, $module_action, $module_route, $module_view;

    /**
     * SponsorRepository constructor.
     * @param $repository
     */
    public function __construct(SponsorRepository $repository)
    {
        $this->repository = $repository;

        $this->module_action = "";
        $this->module_parent = "Summit";
        $this->module_name = 'sponsors';
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
//        dd($$module_name);
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

        $page_heading = "Create New Sponsor";

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

    public function show(Sponsor $sponsor)
    {
        $module_parent = $this->module_parent;
        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);
        $module_icon = $this->module_icon;
        $module_action = "Show";
        $module_route = $this->module_route;
        $module_view = $this->module_view;

        $page_heading = "Sponsor Details";

        $module_name_singular = $sponsor;

        return view($module_view.'.show',  compact('module_name', "module_name_singular", 'module_parent', 'module_icon', 'page_heading', 'module_action', 'module_view', 'module_route'));
    }

    public function edit(Sponsor $sponsor)
    {
        $module_parent = $this->module_parent;
        $module_name = $this->module_name;
        $module_name_singular = str_singular($this->module_name);
        $module_icon = $this->module_icon;
        $module_action = "Update";
        $module_route = $this->module_route;
        $module_view = $this->module_view;

        $page_heading = "Sponsor Update";

        $module_name_singular = $sponsor;

        return view($module_view.'.edit',  compact('module_name', "module_name_singular", 'module_parent', 'module_icon', 'page_heading', 'module_action', 'module_view', 'module_route'));
    }

    public function update(Sponsor $sponsor, Request $request)
    {
        $module_name_singular = str_singular($this->module_name);
        $module_route = $this->module_route;

        $$module_name_singular = $this->repository->update($sponsor, [
            'data' => $request->except(['_token']),
        ]);

//        \Log::info(ucfirst($module_action) . " '$module_name': '" . $request->name . ", ID:" . $request->id . " ' by User:" . $this->user->name);
        return redirect()->route($module_route . ".index")->withFlashSuccess('Record successfully updated');
    }

}
