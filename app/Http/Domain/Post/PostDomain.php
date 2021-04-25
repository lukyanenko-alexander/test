<?php

namespace App\Http\Domain\Post;

use App\Http\Domain\BaseDomain;
use App\Models\Post;
use App\Models\Rate;
use App\Repositories\Post\PostRepository;
use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PostDomain extends BaseDomain
{
    /**
     * @var PostRepository
     */
    private $repository;

    /**
     * PostDomain constructor.
     * @param PostRepository $repository
     */
    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $id
     * @return Model
     */
    public function show(string $id): Model
    {
        $post = $this->repository()->show($id, $this->relationsShow());

        $averageRate = $this->getAverageRate($post->rates);

        unset($post->rates);
        $post->rates = $averageRate;

        return $post;
    }

    /**
     * @param Collection $rates
     * @return float
     */
    protected function getAverageRate(Collection $rates): float
    {
        if ($rates->count() === 0) {
            return 0;
        }

        if ($rates->count() === 1) {
            return $rates->first()->pivot->rate;
        }

        $ratesArr = [];

        foreach ($rates as $rate) {
            $ratesArr[] = $rate->pivot->rate;
        }

        return round(array_sum($ratesArr) / count($ratesArr), 1);
    }

    /**
     * @param Post $post
     * @return Post
     */
    public function setAverageRate(Post $post)
    {
        $averageRate = $this->getAverageRate($post->rates);
        unset($post->rates);
        $post->rates = $averageRate;

        return $post;
    }

    /**
     * @return string[]
     */
    public function relationsAll(): array
    {
        return ['rates'];
    }

    /**
     * @return string[]
     */
    public function relationsShow(): array
    {
        return ['comments', 'rates', 'user'];
    }

    /**
     * @return RepositoryInterface
     */
    public function repository(): RepositoryInterface
    {
        return $this->repository;
    }
}
