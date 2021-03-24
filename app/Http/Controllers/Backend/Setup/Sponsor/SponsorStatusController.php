<?php

namespace App\Http\Controllers\Backend\Setup\Sponsor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Models\Auth\User;
use App\Models\Sponsor\Sponsor;
use App\Models\Team\Team;
use App\Repositories\Backend\Sponsor\SponsorRepository;
use App\Repositories\Backend\Team\TeamRepository;
use Illuminate\Http\Request;

/**
 * Class TeamStatusController.
 */
class SponsorStatusController extends Controller
{
    /**
     * @var SponsorRepository
     */
    protected $sponsorRepository, $module_parent, $module_name, $module_icon, $module_action, $module_route, $module_view;

    /**
     * TransEventsStatusController constructor.
     * @param SponsorRepository $sponsorRepository
     */
    public function __construct(SponsorRepository $sponsorRepository)
    {

        $this->module_action = "";
        $this->module_parent = "Summit";
        $this->module_name = 'sponsors';
        $this->module_icon = 'mdi-hospital-building';

        $this->module_route = "admin.setup." . $this->module_name;
        $this->module_view = "backend.setup." . $this->module_name;

        $this->sponsorRepository = $sponsorRepository;
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

        $$module_name = $this->sponsorRepository->getInactivePaginated(25, 'id', 'asc');

        return view('backend.setup.teams.deactivated', compact('module_name', "$module_name", 'module_parent', 'page_heading'));
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function getDeleted(Request $request)
    {
        return view('backend.auth.user.deleted')
            ->withUsers($this->userRepository->getDeletedPaginated(25, 'id', 'asc'));
    }

    /**
     * @param Sponsor $sponsor
     * @param                   $status
     * @param Request $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function mark(Sponsor $sponsor, $status, Request $request)
    {
        $this->sponsorRepository->mark($sponsor, $status);

        return redirect()->route($status == 1 ?
            'admin.setup.sponsors.index' :
            'admin.setup.sponsors.deactivated'
        )->withFlashSuccess("Event status has been updated");
    }

    /**
     * @param User $deletedUser
     * @param ManageUserRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function delete(User $deletedUser, ManageUserRequest $request)
    {
        $this->userRepository->forceDelete($deletedUser);

        return redirect()->route('admin.auth.user.deleted')->withFlashSuccess(__('alerts.backend.users.deleted_permanently'));
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
