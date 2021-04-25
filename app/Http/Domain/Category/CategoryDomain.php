<?php

namespace App\Http\Domain\Category;

use App\Http\Domain\BaseDomain;
use App\Http\Domain\Post\PostDomain;
use App\Models\Post;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryDomain extends BaseDomain
{
    /**
     * @var CategoryRepository
     */
    private $repository;

    /**
     * @var PostDomain
     */
    private $postDomain;

    /**
     * CategoryDomain constructor.
     * @param CategoryRepository $repository
     * @param PostDomain $postDomain
     */
    public function __construct(CategoryRepository $repository, PostDomain $postDomain)
    {
        $this->repository = $repository;
        $this->postDomain = $postDomain;
    }

    /**
     * @param string $id
     * @return Model
     */
    public function show(string $id): Model
    {
        $category = $this->repository()->show($id, $this->relationsShow());

        $category->posts->map(function ($post) {
            return $this->postDomain->setAverageRate($post);
        });

        return $category;
    }

    /**
     * @return string[]
     */
    public function relationsShow(): array
    {
        return ['posts.user'];
    }

    /**
     * @return RepositoryInterface
     */
    public function repository(): RepositoryInterface
    {
        return $this->repository;
    }
}
