<?php

namespace App\Repositories\Backend\TransEvent;


use App\Exceptions\GeneralException;
use App\Models\Auth\User;
use App\Models\Schedule\Schedule;
use App\Models\TransEvent\TransEvent;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use File;
use Intervention\Image\Facades\Image;
use Composer\EventDispatcher\Event;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

/**
 * Class TransEventRepository.
 */
class TransEventRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return TransEvent::class;
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
     * @return Event
     */
    public function create(array $data): TransEvent
    {
        $data = Arr::get($data, 'data');
        $name = null;

        if (Arr::has($data,'banner')){
            $file = Arr::get($data,'banner');

            $dir = public_path('images');

            if (!File::exists($dir)) {
                File::makeDirectory($dir);
            }

            $name = time().$file->getClientOriginalName();

            $img = Image::make($file);
            $img->resize(config('application.post_images.width'), config('application.post_images.height'))->save(($dir . DIRECTORY_SEPARATOR . $name));
        }

        return DB::transaction(function () use ($data, $name) {
            $event = parent::create([
                'name' => Arr::get($data, 'name'),
                'venue' => Arr::get($data, 'venue'),
                'organizer' => Arr::get($data, 'organizer'),
                'description' => Arr::get($data, 'description'),
                'image' => $name,
                'start_date' => Arr::get($data, 'start_date'),
                'end_date' => Arr::get($data, 'end_date'),
                'status' => Arr::get($data, 'active'),

            ]);

            if ($event) {
                return $event;
            }

            throw new GeneralException('Failed to add record.');
        });
    }


    /**
     * @param Event Event
     * @param array $data
     *
     * @return Event
     */
    public function update(TransEvent $event, array $data): TransEvent
    {
        $data = Arr::get($data, 'data');
        $name = null;

        if (Arr::has($data,'banner')){
            $file = Arr::get($data,'banner');

            $dir = public_path('images');

            if (!File::exists($dir)) {
                File::makeDirectory($dir);
            }

            $name = time().$file->getClientOriginalName();

            $img = Image::make($file);
            $img->resize(config('application.post_images.width'), config('application.post_images.height'))->save(($dir . DIRECTORY_SEPARATOR . $name));
        }

        return DB::transaction(function () use ($name, $event, $data) {

            if ($event->update([
                'name' => Arr::get($data, 'name'),
                'venue' => Arr::get($data, 'venue'),
                'organizer' => Arr::get($data, 'organizer'),
                'description' => Arr::get($data, 'description'),
                'image' => $name,
                'start_date' => Arr::get($data, 'start_date'),
                'end_date' => Arr::get($data, 'end_date'),
                'status' => Arr::get($data, 'active'),
            ])) {

                return $event;
            }

            throw new GeneralException('Failed to update record');
        });
    }


    /**
     * @param User $user
     * @param      $status
     *
     * @return User
     * @throws GeneralException
     */
    public function mark(TransEvent $event, $status): TransEvent
    {
        $event->status = $status;

        switch ($status) {
            case 0:
                // event(new UserDeactivated($user));
                break;

            case 1:
                //event(new UserReactivated($user));
                break;
        }

        if ($event->save()) {
            return $event;
        }

        throw new GeneralException('Failed to update record');
    }

    /**
     * @param User $user
     *
     * @return User
     * @throws GeneralException
     */
    public function forceDelete(TransEvent $event): TransEvent
    {
        return DB::transaction(function () use ($event) {

            if ($event->forceDelete()) {
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
    public function restore(TransEvent $event): TransEvent
    {
        if ($event->restore()) {
            return $event;
        }

        throw new GeneralException('Failed to restore record');
    }
}
