<?php

namespace App\Repositories\Backend\Member;


use App\Exceptions\GeneralException;
use App\Models\Auth\User;
use App\Models\Member\Member;
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
class MemberRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Member::class;
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
    public function create(array $data): Member
    {
        $data = Arr::get($data, 'data');
        $name = null;
        if (Arr::has($data,'photo')){
            $file = Arr::get($data,'photo');

            $dir = public_path('images');

            if (!File::exists($dir)) {
                File::makeDirectory($dir);
            }

            $name = time().$file->getClientOriginalName();

            $img = Image::make($file);
            $img->resize(config('application.post_images.width'), config('application.post_images.height'))->save(($dir . DIRECTORY_SEPARATOR . $name));
        }

        return DB::transaction(function () use ($data, $name) {
            $member = parent::create([
                'name' => Arr::get($data,'name'),
                'team_id' => Arr::get($data,'team_id'),
                'role' => Arr::get($data,'role'),
                'batting_style' => Arr::get($data,'batting_style'),
                'bowling_Style' => Arr::get($data,'bowling_Style'),
                'about' => Arr::get($data, 'about'),
                'photo' => $name,
                'status' => Arr::get($data, 'active'),

            ]);

            if ($member) {
                return $member;
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
    public function update(Member $member, array $data): Member
    {
        $data = Arr::get($data,'data');
        $name = null;

        if (Arr::has($data,'photo')){
            $file = Arr::get($data,'photo');

            $dir = public_path('images');

            if (!File::exists($dir)) {
                File::makeDirectory($dir);
            }

            $name = time().$file->getClientOriginalName();

            $img = Image::make($file);
            $img->resize(config('application.post_images.width'), config('application.post_images.height'))->save(($dir . DIRECTORY_SEPARATOR . $name));
        }

        return DB::transaction(function () use ($name, $member, $data) {

            if ($member->update([
                'name' => Arr::get($data,'name'),
                'role' => Arr::get($data,'role'),
                'batting_style' => Arr::get($data,'batting_style'),
                'bowling_Style' => Arr::get($data,'bowling_Style'),
                'about' => Arr::get($data, 'about'),
                'photo' => $name,
                'status' => Arr::get($data, 'active'),
            ])) {

                return $member;
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
    public function mark(Member $member, $status): Member
    {
        $member->status = $status;

        switch ($status) {
            case 0:
               // event(new UserDeactivated($user));
                break;

            case 1:
                //event(new UserReactivated($user));
                break;
        }

        if ($member->save()) {
            return $member;
        }

        throw new GeneralException('Failed to update record');
    }

    /**
     * @param User $user
     *
     * @return User
     * @throws GeneralException
     */
    public function forceDelete(Member $member): Member
    {
        return DB::transaction(function () use ($member) {

            if ($member->forceDelete()) {
                return $member;
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
    public function restore(Member $member): Member
    {
        if ($member->restore()) {
            return $member;
        }

        throw new GeneralException('Failed to restore record');
    }
}
