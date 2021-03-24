<?php

namespace App\Repositories\Backend\Sponsor;


use App\Exceptions\GeneralException;
use App\Models\Auth\User;
use App\Models\Sponsor\Sponsor;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use File;
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

/**
 * Class SponsorRepository.
 */
class SponsorRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Sponsor::class;
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
     * @return Sponsor
     */
    public function create(array $data): Sponsor
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
            $sponsor = parent::create([
                'name' => Arr::get($data,'name'),
                'company_name' => Arr::get($data,'company_name'),
                'description' => Arr::get($data, 'description'),
                'banner' => $name,
                'status' => Arr::get($data, 'active'),

            ]);

            if ($sponsor) {
                return $sponsor;
            }

            throw new GeneralException('Failed to add record.');
        });
    }

    /**
     * @param Sponsor $sponsor
     * @param array $data
     *
     * @return Sponsor
     */
    public function update(Sponsor $sponsor, array $data): Sponsor
    {
        $data = Arr::get($data,'data');
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


        return DB::transaction(function () use ($name, $sponsor, $data) {

            if ($sponsor->update([
                'name' => Arr::get($data,'name'),
                'description' => Arr::get($data, 'description'),
                'banner' => $name,
                'status' => Arr::get($data, 'active'),
            ])) {

                return $sponsor;
            }

            throw new GeneralException('Failed to update record');
        });
    }


    /**
     * @param Sponsor $sponsor
     * @param      $status
     *
     * @return Sponsor
     * @throws GeneralException
     */
    public function mark(Sponsor $sponsor, $status): Sponsor
    {
        $sponsor->status = $status;

        switch ($status) {
            case 0:
               // event(new UserDeactivated($user));
                break;

            case 1:
                //event(new UserReactivated($user));
                break;
        }

        if ($sponsor->save()) {
            return $sponsor;
        }

        throw new GeneralException('Failed to update record');
    }

    /**
     * @param Sponsor $sponsor
     *
     * @return Sponsor
     * @throws GeneralException
     */
    public function forceDelete(Sponsor $sponsor): Sponsor
    {
        return DB::transaction(function () use ($sponsor) {

            if ($sponsor->forceDelete()) {
                return $sponsor;
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
    public function restore(Sponsor $sponsor): Sponsor
    {
        if ($sponsor->restore()) {
            return $sponsor;
        }

        throw new GeneralException('Failed to restore record');
    }
}
