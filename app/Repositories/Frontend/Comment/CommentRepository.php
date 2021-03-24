<?php

namespace App\Repositories\Frontend\Comment;


use App\Exceptions\GeneralException;
use App\Models\Auth\User;
use App\Models\Comment\Comment;
use App\Models\Post\Post;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

/**
 * Class CommentEventRepository.
 */
class CommentRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Comment::class;
    }

    /**
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
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
     * @param array $input
     * @return Post
     */

    public function create(array $input): Comment
    {
        $data = Arr::get($input, 'data');

        return DB::transaction(function () use ($data) {
            $comment = parent::create([
                'comment' => Arr::get($data,'comment'),
                'status' => 0,
                'post_id' => Arr::get($data,'post_id'),
            ]);

            if ($comment) {
                return $comment;
            }

            throw new GeneralException('Failed to add record.');
        });
    }


    /**
     * @param Comment $comment
     * @param array $data
     * @return Comment
     */
    public function update(Comment $comment, array $data): Comment
    {
        $data = Arr::get($data,'data');

        return DB::transaction(function () use ($comment, $data) {

            if ($comment->update([
                'name' => Arr::get($data,'name'),
                'description' => Arr::get($data, 'description'),
                'status' => Arr::get($data, 'active'),
            ])) {

                return $comment;
            }

            throw new GeneralException('Failed to update record');
        });
    }


    /**
     * @param Post $post
     * @param $status
     * @return Post
     * @throws GeneralException
     */
    public function mark(Comment $comment, $status): Comment
    {
        $comment->status = $status;

        switch ($status) {
            case 0:
               // event(new UserDeactivated($user));
                break;

            case 1:
                //event(new UserReactivated($user));
                break;
        }

        if ($comment->save()) {
            return $comment;
        }

        throw new GeneralException('Failed to update record');
    }

    /**
     * @param User $user
     *
     * @return User
     * @throws GeneralException
     */
    public function forceDelete(Comment $comment): Comment
    {
        return DB::transaction(function () use ($comment) {

            if ($comment->forceDelete()) {
                return $comment;
            }

            throw new GeneralException('Failed to delete record');
        });
    }


    /**
     * @param Post $post
     * @return Post
     * @throws GeneralException
     */
    public function restore(Comment $comment): Comment
    {
        if ($comment->restore()) {
            return $comment;
        }

        throw new GeneralException('Failed to restore record');
    }
}
