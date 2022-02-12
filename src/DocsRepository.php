<?php


namespace Andruby\DeepDocs;

use Andruby\DeepDocs\Models\Catalog;
use Andruby\DeepDocs\Models\Documents;
use BinaryTorch\LaRecipe\DocumentationRepository;
use BinaryTorch\LaRecipe\Traits\HasBladeParser;
use BinaryTorch\LaRecipe\Traits\HasMarkdownParser;

class DocsRepository extends DocumentationRepository
{
    use HasBladeParser, HasMarkdownParser;

    /**
     * @param $version
     * @param null $page
     * @param array $data
     * @return DocsRepository
     */
    public function get($version, $page = null, $data = [], $doc_id = 1)
    {
        $this->version = $version;
        $this->sectionPage = $page ?: config('larecdocsipe.docs.landing');
        $this->index = $this->getIndex($version);

        $this->content = $this->get_a($version, $this->sectionPage, $data, $doc_id);

        if (is_null($this->content)) {
            return $this->prepareNotFound();
        }

        $this->prepareTitle()
            ->prepareCanonical();

        return $this;
    }

    public function get_a($version, $page, $data = [], $doc_id = 1)
    {
        $parsedContent = Documents::query()->where('id', $doc_id)->value('content');
        $parsedContent = $this->parse($parsedContent);
        $parsedContent = $this->replaceLinks($version, $parsedContent);

        return $this->renderBlade($parsedContent, $data);
    }

    public static function replaceLinks($version, $content)
    {
        $content = str_replace('{{version}}', $version, $content);

        $content = str_replace('{{route}}', trim(config('larecipe.docs.route'), '/'), $content);

        $content = str_replace('"#', '"' . request()->getRequestUri() . '#', $content);

        return $content;
    }

    public function getIndex($version)
    {
        $catalog_list = Catalog::query()->where('project_id', 1)->get();
        $index = "";
        foreach ($catalog_list as $catalog) {
            $index .= "- ## " . $catalog['title'] . "\n";
            $article_list = Documents::query()->where('catalog_id', $catalog['id'])->get();
            foreach ($article_list as $article) {
                $index .= "   - [" . $article['title'] . "](/" . $version . "/" . $article['id'] . ".html)\n";
            }
        }
        $parsedContent = $this->parse($index);

        return $this->replaceLinks($version, $parsedContent);

    }

    public function genIndex($indexContent, $version = null)
    {
        $parsedContent = $this->parse($indexContent);

        $this->index = $this->replaceLinks($version, $parsedContent);
        return $this->index;
    }

    public function genContent($content, $version)
    {

        $parsedContent = $this->parse($content);
        $parsedContent = $this->replaceLinks($version, $parsedContent);

        $this->content = $this->renderBlade($parsedContent, []);
        if (is_null($this->content)) {
            return $this->prepareNotFound();
        }

        $this->prepareTitle()
            ->prepareCanonical();

        return $this;
    }


}