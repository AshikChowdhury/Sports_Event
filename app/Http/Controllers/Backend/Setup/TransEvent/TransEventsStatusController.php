<?php

namespace App\Http\Controllers\Backend\Setup\TransEvent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Models\Auth\User;
use App\Models\TransEvent\TransEvent;
use App\Repositories\Backend\Auth\UserRepository;
use App\Repositories\Backend\TransEvent\TransEventRepository;
use Illuminate\Http\Request;

/**
 * Class UserStatusController.
 */
class TransEventsStatusController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $transEventRepository, $module_parent, $module_name, $module_icon, $module_action, $module_route, $module_view;

    /**
     * TransEventsStatusController constructor.
     * @param TransEventRepository $transEventRepository
     */
    public function __construct(TransEventRepository $transEventRepository)
    {

        $this->module_action = "";
        $this->module_parent = "Event Management";
        $this->module_name = 'events';
        $this->module_icon = 'mdi-hospital-building';

        $this->module_route = "admin.setup." . $this->module_name;
        $this->module_view = "backend.setup." . $this->module_name;

        $this->transEventRepository = $transEventRepository;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function getDeactivated(Request $request)
    {
        $module_parent = $this->module_parent;
        $module_name = $this->module_name;

        $page_heading = "All Deactivated ".ucfirst($this->module_name);

        $$module_name = $this->transEventRepository->getInactivePaginated(25, 'id', 'asc');

        return view('backend.setup.events.deactivated', compact('module_name', "$module_name", 'module_parent', 'page_heading'));
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageUserRequest $request)
    {
        return view('backend.auth.user.deleted')
            ->withUsers($this->userRepository->getDeletedPaginated(25, 'id', 'asc'));
    }

    /**
     * @param User $user
     * @param                   $status
     * @param ManageUserRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function mark(TransEvent $event, $status, Request $request)
    {
        $this->transEventRepository->mark($event, $status);

        return redirect()->route($status == 1 ?
            'admin.setup.events.index' :
            'admin.setup.events.deactivated'
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
