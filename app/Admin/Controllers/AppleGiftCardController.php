<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\Tools\AppleRequestParamGuidanceTool;
use App\Admin\Extensions\Tools\AppleRequestParamTool;
use App\Admin\Extensions\Tools\ImportTool;
use App\Admin\Repositories\AppleGiftCard;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class AppleGiftCardController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new AppleGiftCard(), function (Grid $grid) {
            $grid->tools(function (Grid\Tools $tools) {
                $tools->append(new ImportTool());
                $tools->append(new AppleRequestParamTool());
                $tools->append(new AppleRequestParamGuidanceTool());
            });
            $grid->column('id')->sortable();
            $grid->column('gift_card_number');
            $grid->column('currency');
            $grid->column('balance');
            $grid->column('is_checked');
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
        return Show::make($id, new AppleGiftCard(), function (Show $show) {
            $show->field('id');
            $show->field('gift_card_number');
            $show->field('currency');
            $show->field('balance');
            $show->field('is_checked');
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
        return Form::make(new AppleGiftCard(), function (Form $form) {
            $form->display('id');
            $form->text('gift_card_number');
            $form->text('currency');
            $form->text('balance');
            $form->text('is_checked');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }

    protected function guidance()
    {
        return '指导';
    }
}
