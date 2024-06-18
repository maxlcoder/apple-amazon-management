<?php

namespace App\Admin\Extensions\Tools;

use App\Admin\Forms\AppleRequestParamForm;
use App\Admin\Forms\ImportForm;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\Tools\AbstractTool;
use Dcat\Admin\Widgets\Modal;

class AppleRequestParamGuidanceTool extends AbstractTool
{
    protected function script()
    {

    }



    public function render()
    {
        return Modal::make()
            ->lg()
            ->scrollable()
            ->title($title = trans('admin.apple.request_param_guidance'))
            ->body(view('admin.tools.apple_request_param_guidance'))
            ->button("<button class='btn btn-primary'>{$title}</button>");
    }
}