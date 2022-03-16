<?php

namespace Andruby\DeepDocs\Controllers;

use Andruby\DeepAdmin\Controllers\ContentController;
use Andruby\DeepAdmin\Models\Content;
use Andruby\DeepDocs\Models\Versions;
use Andruby\DeepAdmin\Components\Attrs\SelectOption;
use Andruby\DeepAdmin\Components\Form\Input;
use Andruby\DeepAdmin\Components\Form\Select;
use Andruby\DeepAdmin\Form;
use Andruby\DeepAdmin\Grid;

class ProjectController extends ContentController
{
    protected function grid_list(Grid $grid): Grid
    {
        $grid->dialogForm($this->form()->isDialog()->className('p-15'), '600px');

        return $grid;
    }

    protected function form($isEdit = 0, $id = null): Form
    {
        $form = new Form(new Content('projects'));
        $form->getActions()->buttonCenter();
        $form->labelPosition('right')->statusIcon(true)->labelWidth('150px');
        $form->item('name', '项目名称')
            ->component(Input::make()->placeholder('请输入文档项目名称'))
            ->inputWidth(100)->required();

        $options = [];
        if ($isEdit) {
            $project_id = request('project');
            $versions = Versions::query()->where('project_id', $project_id)->get()->toArray();
            foreach ($versions as $version) {
                $options[] = SelectOption::make($version['id'], $version['title']);
            }
        }

        $form->item('default_version', '默认版本号')
            ->component(
                Select::make(null)->filterable()
                    ->isRelatedSelect(true)
                    ->relatedSelectRef('city_id')
                    ->options($options))
            ->help("如无版本号显示，在保存项目后在版本号管理中添加版本号。")
            ->inputWidth(100);

        $form->item('router_name', '路由标识')
            ->component(
                Input::make()->placeholder('请输入路由名称')
            )->help('跳转时候的项目的路由url唯一标识')
            ->inputWidth(100)->required()
            ->unique(true, 'projects', 'router_name', '路由标记');

        $form->item('default_show', '首页默认')
            ->component(
                Select::make()->options([SelectOption::make(0, '不显示'), SelectOption::make(1, '显示')])
            )->help('首页默认显示文档')
            ->inputWidth(100);

        $form->item('github', 'github地址')
            ->component(
                Input::make()->style('width:300px')->placeholder('请输入github地址')
            )->inputWidth(100);

        return $form;
    }
}
