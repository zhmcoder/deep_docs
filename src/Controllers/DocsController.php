<?php

namespace Andruby\DeepDocs\Controllers;

use Andruby\DeepDocs\DocsRepository;
use Andruby\DeepDocs\Models\Catalog;
use Andruby\DeepDocs\Models\Documents;
use Andruby\DeepDocs\Models\Projects;
use Andruby\DeepDocs\Models\Versions;
use Andruby\DeepDocs\Services\VersionService;
use App\Http\Controllers\Controller;

class DocsController extends Controller
{
    /**
     * @var DocumentationRepository
     */
    protected $documentationRepository;
    protected $versions;
    protected $currentVersion;

    /**
     * DocumentationController constructor.
     * @param DocsRepository $documentationRepository
     */
    public function __construct(DocsRepository $documentationRepository)
    {
        $this->documentationRepository = $documentationRepository;

        if (config('larecipe.settings.auth')) {
            $this->middleware(['auth']);
        } else {
            if (config('larecipe.settings.middleware')) {
                $this->middleware(config('larecipe.settings.middleware'));
            }
        }
    }

    public function index($router_name = null)
    {
        $project = $this->get_project($router_name);

        $version = VersionService::instance()->defaultVersion($project['id']);
        $documentation = Documents::query()->where('project_id', $project['id'])
            ->orderBy('sort')->first();

        $this->documentationRepository->genIndex($this->get_index($project['id'], $project['router_name'], $version));

        $documentation = $this->documentationRepository->genContent($documentation['content'], $version);
        $this->versions = VersionService::instance()->versions($project['id']);

        return response()->view('larecipe::docs', [
            'title' => $documentation->title,
            'index' => $documentation->index,
            'content' => $documentation->content,
            'currentVersion' => $version,
            'currentSection' => $documentation->currentSection,
            'canonical' => $documentation->canonical,
            'versions' => $this->versions,
            'project' => $project
        ], $documentation->statusCode);
    }

    private function get_index($project_id, $router_name, $version = null)
    {
        $catalog_list = Catalog::query()
            ->where('project_id', $project_id)->get();
        $index = "";
        foreach ($catalog_list as $catalog) {
            $index .= "- ## " . $catalog['title'] . "\n";
            $article_list = Documents::query()->where('catalog_id', $catalog['id'])->get();
            foreach ($article_list as $article) {
                $index .= "   - [" . $article['title'] . "](/" . $router_name . "/" . $version . "/" . $article['id'] . ".html)\n";
            }
        }

        return $index;
    }

    public function detail($router_name, $version, $doc_id)
    {
        $project = $this->get_project($router_name);

        $documentation = Documents::query()->where('id', $doc_id)
            ->orderBy('sort')->first();

        $this->documentationRepository->genIndex($this->get_index($project['id'], $project['router_name'], $version));
        $documentation = $this->documentationRepository->genContent($documentation['content'], $version);
        $this->versions = VersionService::instance()->versions($project['id']);


        return response()->view('larecipe::docs', [
            'title' => $documentation->title,
            'index' => $documentation->index,
            'content' => $documentation->content,
            'currentVersion' => $version,

            'currentSection' => $documentation->currentSection,
            'canonical' => $documentation->canonical,
            'versions' => $this->versions,
            'project'=>$project
        ], $documentation->statusCode);
    }

    public function version($router_name, $version)
    {
        $project = $this->get_project($router_name);

        $documentation = Documents::query()->where('project_id', $project['id'])
            ->orderBy('sort')->first();

        $this->documentationRepository->genIndex($this->get_index($project['id'], $project['router_name'], $version));
        $documentation = $this->documentationRepository->genContent($documentation['content'], $version);
        $this->versions = VersionService::instance()->versions($project['id']);


        return response()->view('larecipe::docs', [
            'title' => $documentation->title,
            'index' => $documentation->index,
            'content' => $documentation->content,
            'currentVersion' => $version,
            'currentSection' => $documentation->currentSection,
            'canonical' => $documentation->canonical,
            'versions' => $this->versions,
            'project' => $project
        ], $documentation->statusCode);
    }

    private function get_project($router_name)
    {
        if (!empty($router_name)) {
            $project = Projects::query()
                ->where('router_name', $router_name)
                ->first()->toArray();
        }

        if (empty($project)) {
            $project = Projects::query()->orderBy('id')
                ->where('default_show', 1)
                ->limit(1)->first()->toArray();
        }
        return $project;
    }
}
