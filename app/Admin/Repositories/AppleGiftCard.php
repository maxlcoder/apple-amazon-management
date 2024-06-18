<?php

namespace App\Admin\Repositories;

use App\Models\AppleGiftCard as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class AppleGiftCard extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
