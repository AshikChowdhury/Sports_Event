<?php

namespace App\Repositories\Frontend\Post;


use App\Exceptions\GeneralException;
use App\Models\Auth\User;
use App\Models\Post\Post;
use App\Repositories\BaseRepository;
use File;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

/**
 * Class TransEventRepository.
 */
class PostRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Post::class;
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
     * @throws \Throwable
     */

    public function create(array $input): Post
    {
        $data = Arr::get($input, 'data');
        $event = Arr::get($input, 'event');

        $name = null;
        if (Arr::has($data, 'image')) {
            $file = Arr::get($data, 'image');
            $dir = public_path('images/posts');

            if (!File::exists($dir)) {
                File::makeDirectory($dir);
            }

            $name = time() . $file->getClientOriginalName();

            $img = Image::make($file);
//            $img = $img->text('foo', 120, 100, function ($font) {
//                $font->color(array(255, 255, 255, 0.5));
//            });
            $img->resize(config('application.post_images.width'), config('application.post_images.height'), function ($constraint) {
                $constraint->aspectRatio();
            })->save($dir . DIRECTORY_SEPARATOR . $name);

        }
        return DB::transaction(function () use ($data, $name, $event) {
            $post = parent::create([
                'post' => Arr::get($data, 'post'),
                'event_id' => $event,
                'status' => 0,
                'image' => $name

            ]);

            if ($post) {
                return $post;
            }

            throw new GeneralException('Failed to add record.');
        });
    }


    /**
     * @param Post $post
     * @param array $data
     * @return Post
     * @throws \Throwable
     */
    public function update(Post $post, array $data): Post
    {
        $data = Arr::get($data, 'data');
        $name = null;
        if (Arr::has($data, 'logo')) {
            $file = Arr::get($data, 'logo');

            $dir = public_path('images/posts');

            if (!File::exists($dir)) {
                File::makeDirectory($dir);
            }

            $name = time() . $file->getClientOriginalName();

            $img = Image::make($file);
            $img->resize(config('application.post_images.width'), config('application.post_images.height'))->save($dir . DIRECTORY_SEPARATOR . $name);
        }
        return DB::transaction(function () use ($name, $post, $data) {

            if ($post->update([
                'name' => Arr::get($data, 'name'),
                'description' => Arr::get($data, 'description'),
                'logo' => $name,
                'status' => Arr::get($data, 'active'),
            ])) {

                return $post;
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
    public function mark(Post $post, $status): Post
    {
        $post->status = $status;

        switch ($status) {
            case 0:
                // event(new UserDeactivated($user));
                break;

            case 1:
                //event(new UserReactivated($user));
                break;
        }

        if ($post->save()) {
            return $post;
        }

        throw new GeneralException('Failed to update record');
    }

    /**
     * @param Post $post
     * @return Post
     * @throws \Throwable
     */
    public function forceDelete(Post $post): Post
    {
        return DB::transaction(function () use ($post) {

            if ($post->forceDelete()) {
                return $post;
            }

            throw new GeneralException('Failed to delete record');
        });
    }

    /**
     * @param Post $post
     * @return Post
     * @throws GeneralException
     */
    public function restore(Post $post): Post
    {
        if ($post->restore()) {
            return $post;
        }

        throw new GeneralException('Failed to restore record');
    }
}
