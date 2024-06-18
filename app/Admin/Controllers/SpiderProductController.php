<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\SpiderProduct;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class SpiderProductController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new SpiderProduct(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('sku');
            $grid->column('url');
            $grid->column('min_price');
            $grid->column('is_watching');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new SpiderProduct(), function (Show $show) {
            $show->field('id');
            $show->field('id');
            $show->field('name');
            $show->field('sku');
            $show->field('url');
            $show->field('min_price');
            $show->field('is_watching');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new SpiderProduct(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('sku');
            $form->text('url');
            $form->decimal('min_price');
            $form->text('is_watching');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
