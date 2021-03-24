<?php

namespace App\Http\Controllers\Backend\Setup\TransEvent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Models\Auth\User;
use App\Models\Employee\Employee;
use App\Repositories\Backend\Auth\UserRepository;
use App\Repositories\Backend\Employee\EmployeeRepository;
use Illuminate\Http\Request;

/**
 * Class UserStatusController.
 */
class EmployeeStatusController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $employeeRepository, $module_parent, $module_name, $module_icon, $module_action, $module_route, $module_view;

    /**
     * TransEventsStatusController constructor.
     * @param EmployeeRepository $transEventRepository
     */
    public function __construct(EmployeeRepository $employeeRepository)
    {

        $this->module_action = "";
        $this->module_parent = "Event Management";
        $this->module_name = 'events';
        $this->module_icon = 'mdi-hospital-building';

        $this->module_route = "admin.setup." . $this->module_name;
        $this->module_view = "backend.setup." . $this->module_name;

        $this->employeeRepository = $employeeRepository;
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

        return view('backend.setup.events.deactivated', compact('module_name', "$module_name", 'module_parent', 'page_heading'))
            ->withEmployees($this->employeeRepository->getInactivePaginated(25, 'id', 'asc'));
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
    public function mark(Employee $employee, $status, Request $request)
    {
        $this->employeeRepository->mark($employee, $status);

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
