<?php

namespace Andruby\DeepDocs\Controllers;

use Andruby\DeepAdmin\Controllers\ContentController;
use Andruby\DeepAdmin\Grid;

class CatalogController extends ContentController
{
    protected function grid_list(Grid $grid): Grid
    {
        $grid->dialogForm($this->form()->isDialog()->className('p-15'));

        return parent::grid_list($grid);
    }
}
