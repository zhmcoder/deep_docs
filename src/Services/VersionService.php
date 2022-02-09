<?php


namespace Andruby\DeepDocs\Services;

use Andruby\DeepBlog\Models\Article;
use Andruby\DeepBlog\Models\Category;
use Andruby\DeepDocs\Models\Projects;
use Andruby\DeepDocs\Models\Versions;

/**
 * @method static VersionService instance()
 *
 * Class ArticleService
 * @package App\Api\Services
 */
class VersionService
{
    public static function __callStatic($method, $params): VersionService
    {
        return new self();
    }

    public function versions($project_id = 1)
    {
        return Versions::query()->where('project_id', $project_id)
            ->pluck('title');
    }

    public function defaultVersion($project_id = 1)
    {
        return Projects::query()->where('id', $project_id)
            ->value('default_version');
    }


}