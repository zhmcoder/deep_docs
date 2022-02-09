<?php

namespace Andruby\DeepDocs\Controllers;

use Andruby\DeepDocs\DocsRepository;
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
        $this->versions = VersionService::instance()->versions();
    }

    /**
     * Redirect the index page of docs to the default version.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
//    public function index()
//    {
//        return redirect()->route(
//            'larecipe.show',
//            [
//                'version' => config('larecipe.versions.default'),
//                'page' => config('larecipe.docs.landing')
//            ]
//        );
//    }

    /**
     * Show a documentation page.
     *
     * @param $version
     * @param null $page
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($version, $page = null)
    {
        $version = 1;
        $page = config('larecipe.docs.landing');
        $documentation = $this->documentationRepository->get($version, $page, [], 1);

//        if (Gate::has('viewLarecipe')) {
//            $this->authorize('viewLarecipe', $documentation);
//        }
//
//        if ($this->documentationRepository->isNotPublishedVersion($version)) {
//            return redirect()->route(
//                'larecipe.show',
//                [
//                    'version' => config('larecipe.versions.default'),
//                    'page' => config('larecipe.docs.landing')
//                ]
//            );
//        }

        return response()->view('larecipe::docs', [
            'title' => $documentation->title,
            'index' => $documentation->index,
            'content' => $documentation->content,
            'currentVersion' => $version,
            'currentSection' => $documentation->currentSection,
            'canonical' => $documentation->canonical,
            'versions' => $this->versions
        ], $documentation->statusCode);
    }

    public function index($version = null)
    {
        $version = empty($version) ? VersionService::instance()->defaultVersion() : $version;
        $page = config('larecipe.docs.landing');
        $documentation = $this->documentationRepository->get($version, $page, [], 1);

//        if (Gate::has('viewLarecipe')) {
//            $this->authorize('viewLarecipe', $documentation);
//        }
//
//        if ($this->documentationRepository->isNotPublishedVersion($version)) {
//            return redirect()->route(
//                'larecipe.show',
//                [
//                    'version' => config('larecipe.versions.default'),
//                    'page' => config('larecipe.docs.landing')
//                ]
//            );
//        }

        return response()->view('larecipe::docs', [
            'title' => $documentation->title,
            'index' => $documentation->index,
            'content' => $documentation->content,
            'currentVersion' => $version,
            'currentSection' => $documentation->currentSection,
            'canonical' => $documentation->canonical,
            'versions' => $this->versions
        ], $documentation->statusCode);
    }

    public function detail($version, $doc_id = null)
    {
        //versions
        //project info

        $page = config('larecipe.docs.landing');
        $documentation = $this->documentationRepository->get($version, $page, [], $doc_id);

//        if (Gate::has('viewLarecipe')) {
//            $this->authorize('viewLarecipe', $documentation);
//        }
//
//        if ($this->documentationRepository->isNotPublishedVersion($version)) {
//            return redirect()->route(
//                'larecipe.show',
//                [
//                    'version' => config('larecipe.versions.default'),
//                    'page' => config('larecipe.docs.landing')
//                ]
//            );
//        }

        return response()->view('larecipe::docs', [
            'title' => $documentation->title,
            'index' => $documentation->index,
            'content' => $documentation->content,
            'currentVersion' => $version,

            'currentSection' => $documentation->currentSection,
            'canonical' => $documentation->canonical,
            'versions' => $this->versions
        ], $documentation->statusCode);
    }

    public function version($version)
    {
        //versions
        //project info
        $doc_id=1;
        $page = config('larecipe.docs.landing');
        $documentation = $this->documentationRepository->get($version, $page, [], $doc_id);

//        if (Gate::has('viewLarecipe')) {
//            $this->authorize('viewLarecipe', $documentation);
//        }
//
//        if ($this->documentationRepository->isNotPublishedVersion($version)) {
//            return redirect()->route(
//                'larecipe.show',
//                [
//                    'version' => config('larecipe.versions.default'),
//                    'page' => config('larecipe.docs.landing')
//                ]
//            );
//        }

        return response()->view('larecipe::docs', [
            'title' => $documentation->title,
            'index' => $documentation->index,
            'content' => $documentation->content,
            'currentVersion' => $version,

            'currentSection' => $documentation->currentSection,
            'canonical' => $documentation->canonical,
            'versions' => $this->versions
        ], $documentation->statusCode);
    }
}
