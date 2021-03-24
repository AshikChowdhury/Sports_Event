<?php

namespace App\Http\Controllers\Backend\Setup\Match;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Models\Auth\User;
use App\Models\Match\Match;
use App\Models\Sponsor\Sponsor;
use App\Models\Team\Team;
use App\Repositories\Backend\Match\MatchRepository;
use App\Repositories\Backend\Sponsor\SponsorRepository;
use App\Repositories\Backend\Team\TeamRepository;
use Illuminate\Http\Request;

/**
 * Class MatchStatusController.
 */
class MatchStatusController extends Controller
{
    /**
     * @var $matchRepository
     */
    protected $matchRepository, $module_parent, $module_name, $module_icon, $module_action, $module_route, $module_view;

    /**
     * MatchStatusController constructor.
     * @param MatchRepository $matchRepository
     */
    public function __construct(MatchRepository $matchRepository)
    {

        $this->module_action = "";
        $this->module_parent = "Summit";
        $this->module_name = 'matches';
        $this->module_icon = 'mdi-hospital-building';

        $this->module_route = "admin.setup." . $this->module_name;
        $this->module_view = "backend.setup." . $this->module_name;

        $this->matchRepository = $matchRepository;
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function getDeactivated(Request $request)
    {
        $module_parent = $this->module_parent;
        $module_name = $this->module_name;

        $page_heading = "All Deactivated ".ucfirst($this->module_name);

        $$module_name = $this->matchRepository->getInactivePaginated(25, 'id', 'asc');

        return view('backend.setup.matches.deactivated', compact('module_name', "$module_name", 'module_parent', 'page_heading'));
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function getDeleted(Request $request)
    {
        $module_parent = $this->module_parent;
        $module_name = $this->module_name;

        $$module_name = $this->matchRepository->getDeletedPaginated(25, 'id', 'asc', compact('module_name', "$module_name", 'module_parent', 'page_heading'));

        return view('backend.setup.matches.deleted');
    }

    /**
     * @param Match $match
     * @param                   $status
     * @param Request $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function mark(Match $match, $status, Request $request)
    {
        $this->matchRepository->mark($match, $status);

        return redirect()->route($status == 1 ?
            'admin.setup.matches.index' :
            'admin.setup.matches.deactivated'
        )->withFlashSuccess("Event status has been updated");
    }

    /**
     * @param Match $deletedMatch
     * @param Request $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function delete(Match $deletedMatch, Request $request)
    {
        $this->matchRepository->forceDelete($deletedMatch);

        return redirect()->route('admin.auth.user.deleted')->withFlashSuccess("Match Deleted Permanently");
    }

    /**
     * @param User $deletedUser
     * @param ManageUserRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(User $deletedUser, ManageUserRequest $request)
    {
        $this->userRepository->restore($deletedUser);

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.restored'));
    }
}
