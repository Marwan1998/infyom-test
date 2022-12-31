<?php

namespace App\Repositories;

use App\Models\Game;
use App\Repositories\BaseRepository;

/**
 * Class GameRepository
 * @package App\Repositories
 * @version December 31, 2022, 7:18 pm UTC
*/

class GameRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'company',
        'story',
        'price',
        'year'
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
        return Game::class;
    }
}
