<?php

namespace App\Admin\Extensions\Tools;

use App\Admin\Forms\AppleRequestParamForm;
use App\Admin\Forms\ImportForm;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\Tools\AbstractTool;
use Dcat\Admin\Widgets\Modal;

class AppleRequestParamTool extends AbstractTool
{
    protected function script()
    {

    }

    public function render()
    {
        Admin::script($this->script());

        return Modal::make()
            ->lg()
            ->title($title = trans('admin.apple.request_param'))
            ->body(AppleRequestParamForm::make())
            ->button("<button class='btn btn-primary'><i class=\"feather icon-edit-2\"></i> &nbsp;{$title}</button> &nbsp;");

    }
}