<?php

namespace App\Admin\Repositories;

use App\Models\AdminAppleRequestParam as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class AdminAppleRequestParam extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
