<?php

namespace App\Repositories;

use App\Models\Status;
use App\Repositories\BaseRepository;

/**
 * Class StatusRepository
 * @package App\Repositories
 * @version September 3, 2020, 3:42 pm UTC
*/

class StatusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Status::class;
    }
}
