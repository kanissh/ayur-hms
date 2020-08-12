<?php

namespace App\Repositories;

use App\Models\Patients;
use App\Repositories\BaseRepository;

/**
 * Class PatientsRepository
 * @package App\Repositories
 * @version August 8, 2020, 7:00 am UTC
*/

class PatientsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'gender',
        'nic',
        'address',
        'religion',
        'user_id'
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
        return Patients::class;
    }
}
