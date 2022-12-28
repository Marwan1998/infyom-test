<?php

namespace App\Repositories;

use App\Models\Secret;
use App\Repositories\BaseRepository;

/**
 * Class SecretRepository
 * @package App\Repositories
 * @version December 28, 2022, 12:31 pm UTC
*/

class SecretRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'content',
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
        return Secret::class;
    }
}
