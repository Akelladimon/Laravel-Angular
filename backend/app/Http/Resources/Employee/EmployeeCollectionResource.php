<?php

namespace App\Http\Resources\Employee;

use App\Http\Resources\BaseJsonCollectionResource;

class EmployeeCollectionResource extends BaseJsonCollectionResource
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = EmployeeResource::class;
}
