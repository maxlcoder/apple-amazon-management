<?php

namespace App\Admin\Forms;

use App\Models\AppleGiftCard;
use Carbon\Carbon;
use Dcat\Admin\Admin;
use Dcat\Admin\Widgets\Form;
use Dcat\EasyExcel\Excel;
use Illuminate\Support\Facades\Storage;

class ImportForm extends Form
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
        $headings = ['gift_card_number'];
        $firstSheet = Excel::import(Storage::disk('admin')->path($input['file']))->headings($headings)->first()->toArray();
        foreach ($firstSheet as $value) {
            AppleGiftCard::query()->updateOrCreate(
                [
                    'admin_id' => $adminId,
                    'gift_card_number' => $value['gift_card_number'],
                ],
                [
                    'is_checked' => 0, // 待查询
                ]
            );
        }
        return $this
				->response()
				->success('Processed successfully.')
				->refresh();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->file('file')->accept('xlsx,xls,csv')->required();
    }
}
