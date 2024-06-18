<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\AdminAppleRequestParam;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class AdminAppleRequestParamController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new AdminAppleRequestParam(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('admin_id');
            $grid->column('domain');
            $grid->column('cookies');
            $grid->column('headers');
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
        return Show::make($id, new AdminAppleRequestParam(), function (Show $show) {
            $show->field('id');
            $show->field('admin_id');
            $show->field('domain');
            $show->field('cookies');
            $show->field('headers');
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
        return Form::make(new AdminAppleRequestParam(), function (Form $form) {
            $form->display('id');
            $form->text('admin_id');
            $form->text('domain');
            $form->text('cookies');
            $form->text('headers');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
