<?php

namespace App\Admin\Forms;

use App\Models\AdminAppleRequestParam;
use App\Models\AppleGiftCard;
use Carbon\Carbon;
use Dcat\Admin\Admin;
use Dcat\Admin\Widgets\Form;
use Dcat\EasyExcel\Excel;
use Illuminate\Support\Facades\Storage;

class AppleRequestParamForm extends Form
{
    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return mixed
     */
    public function handle(array $input)
    {
        $adminId = Admin::user()->id;
        AdminAppleRequestParam::query()->updateOrCreate(
            [
                'admin_id' => $adminId,
            ],
            [
                'domain' => $input['domain'],
                'headers' => [
                    'x-aos-stk' => $input['x-aos-stk'],
                ],
                'cookies' => [
                    'dssid2' => $input['dssid2'],
                    'as_disa' => $input['as_disa'],
                    'as_ltn_us-edu' => $input['as_ltn_us-edu'],
                ],
            ]
        );

        return $this
				->response()
				->success('Processed successfully.');
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->text('domain')->required();
        $this->text('x-aos-stk')->required();
        $this->text('dssid2', 'dssid2')->required();
        $this->text('as_disa', 'as_disa')->required();
        $this->text('as_ltn_us-edu', 'as_ltn_us-edu')->required();
    }
}
