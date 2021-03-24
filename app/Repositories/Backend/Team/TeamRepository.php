<?php

namespace App\Repositories\Backend\Team;


use App\Exceptions\GeneralException;
use App\Models\Auth\User;
use App\Models\Team\Team;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use File;
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

/**
 * Class TransEventRepository.
 */
class TeamRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Team::class;
    }

    public function getAll($order_by = 'id', $sort = 'asc')
    {
        return $this->model
            ->orderBy($order_by, $sort)
            ->get();
    }

    /**
     * @param int $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getActivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc'): LengthAwarePaginator
    {
        return $this->model
            ->active()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getInactivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc'): LengthAwarePaginator
    {
        return $this->model
            ->active(false)
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getDeletedPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc'): LengthAwarePaginator
    {
        return $this->model
            ->onlyTrashed()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param array $data
     *
     * @return User
     */
    public function create(array $data): Team
    {
        $data = Arr::get($data, 'data');
        $name = null;
        if (Arr::has($data,'logo')){
            $file = Arr::get($data,'logo');

            $dir = public_path('images');

            if (!File::exists($dir)) {
                File::makeDirectory($dir);
            }

            $name = time().$file->getClientOriginalName();

            $img = Image::make($file);
            $img->resize(config('application.post_images.width'), config('application.post_images.height'))->save(($dir . DIRECTORY_SEPARATOR . $name));
        }

        return DB::transaction(function () use ($data, $name) {
            $team = parent::create([
                'name' => Arr::get($data,'name'),
                'description' => Arr::get($data, 'description'),
                'logo' => $name,
                'status' => Arr::get($data, 'active'),

            ]);

            if ($team) {
                return $team;
            }

            throw new GeneralException('Failed to add record.');
        });
    }

    /**
     * @param Team $team
     * @param array $data
     *
     * @return Team
     */
    public function update(Team $team, array $data): Team
    {
        $data = Arr::get($data,'data');
        $name = null;

        if (Arr::has($data,'logo')){
            $file = Arr::get($data,'logo');

            $dir = public_path('images');

            if (!File::exists($dir)) {
                File::makeDirectory($dir);
            }

            $name = time().$file->getClientOriginalName();

            $img = Image::make($file);
            $img->resize(config('application.post_images.width'), config('application.post_images.height'))->save(($dir . DIRECTORY_SEPARATOR . $name));
        }

        return DB::transaction(function () use ($name, $team, $data) {

            if ($team->update([
                'name' => Arr::get($data,'name'),
                'description' => Arr::get($data, 'description'),
                'logo' => $name,
                'status' => Arr::get($data, 'active'),
            ])) {

                return $team;
            }

            throw new GeneralException('Failed to update record');
        });
    }


    /**
     * @param Team $team
     * @param      $status
     *
     * @return Team
     * @throws GeneralException
     */
    public function mark(Team $team, $status): Team
    {
        $team->status = $status;

        switch ($status) {
            case 0:
               // event(new UserDeactivated($user));
                break;

            case 1:
                //event(new UserReactivated($user));
                break;
        }

        if ($team->save()) {
            return $team;
        }

        throw new GeneralException('Failed to update record');
    }

    /**
     * @param User $user
     *
     * @return User
     * @throws GeneralException
     */
    public function forceDelete(Team $team): Team
    {
        return DB::transaction(function () use ($team) {

            if ($team->forceDelete()) {
                return $event;
            }

            throw new GeneralException('Failed to delete record');
        });
    }

    /**
     * @param User $user
     *
     * @return User
     * @throws GeneralException
     */
    public function restore(Team $team): Team
    {
        if ($team->restore()) {
            return $team;
        }

        throw new GeneralException('Failed to restore record');
    }
}
