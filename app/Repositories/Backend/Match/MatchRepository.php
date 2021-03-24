<?php

namespace App\Repositories\Backend\Match;


use App\Exceptions\GeneralException;
use App\Models\Auth\User;
use App\Models\Match\Match;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use File;
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

/**
 * Class MatchRepository.
 */
class MatchRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Match::class;
    }

    public function getAll($order_by = 'id', $sort = 'asc')
    {
        return $this
            ->model
            ->with('transevent')
            ->with('team_1')
            ->with('team_2')
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
     * @return Match
     */
    public function create(array $data): Match
    {
        $data = Arr::get($data, 'data');

        return DB::transaction(function () use ($data) {
            $match = parent::create([
                'event_id' => Arr::get($data,'event_id'),
                'team1' => Arr::get($data,'team1'),
                'team2' => Arr::get($data, 'team2'),
                'date' => Arr::get($data, 'date'),
                'time' => Arr::get($data, 'time'),
                'venue' => Arr::get($data, 'venue'),
                'status' => Arr::get($data, 'active'),
            ]);

            if ($match) {
                return $match;
            }

            throw new GeneralException('Failed to add record.');
        });
    }

    /**
     * @param Match $match
     * @param array $data
     *
     * @return Match
     */
    public function update(Match $match, array $data): Match
    {
        $data = Arr::get($data,'data');

        return DB::transaction(function () use ($match, $data) {

            if ($match->update([
                'event_id' => Arr::get($data,'event_id'),
                'team1' => Arr::get($data,'team1'),
                'team2' => Arr::get($data, 'team2'),
                'date' => Arr::get($data, 'date'),
                'time' => Arr::get($data, 'time'),
                'venue' => Arr::get($data, 'venue'),
                'status' => Arr::get($data, 'active'),
            ])) {

                return $match;
            }

            throw new GeneralException('Failed to update record');
        });
    }


    /**
     * @param Match $match
     * @param      $status
     *
     * @return Match
     * @throws GeneralException
     */
    public function mark(Match $match, $status): Match
    {
        $match->status = $status;

        switch ($status) {
            case 0:
               // event(new UserDeactivated($user));
                break;

            case 1:
                //event(new UserReactivated($user));
                break;
        }

        if ($match->save()) {
            return $match;
        }

        throw new GeneralException('Failed to update record');
    }

    /**
     * @param Match $match
     *
     * @return Match
     * @throws GeneralException
     */
    public function forceDelete(Match $match): Match
    {
        return DB::transaction(function () use ($match) {

            if ($match->forceDelete()) {
                return $match;
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
    public function restore(Match $match): Match
    {
        if ($match->restore()) {
            return $match;
        }

        throw new GeneralException('Failed to restore record');
    }
}
