<?php

namespace App\Repositories;

use App\Models\Cusine;
use App\Repositories\BaseRepository;

/**
 * Class CusineRepository
 * @package App\Repositories
 * @version June 6, 2021, 6:04 pm UTC
*/

class CusineRepository extends BaseRepository
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
        return Cusine::class;
    }
}
