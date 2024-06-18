<?php

namespace App\Admin\Repositories;

use App\Models\SpiderProduct as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class SpiderProduct extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
