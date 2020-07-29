<?php

namespace App\Repositories;

use App\Models\Record;
use App\Repositories\BaseRepository;

/**
 * Class RecordRepository
 * @package App\Repositories
 * @version July 29, 2020, 8:31 am UTC
*/

class RecordRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'patient_id',
        'hospital_id',
        'data'
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
        return Record::class;
    }
}
