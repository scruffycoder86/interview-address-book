<?php

namespace Distinc\Wayout\Domain\Repository;

use Illuminate\Database\Eloquent\Model;
use Distinc\Wayout\Concern\ConnectionConcern;

/**
 * Class AbstractRepository
 *
 * @package Distinc\Demo\Domain\Repository
 */
abstract class AbstractRepository
{
    /**
     * @var $model Model
     */
    protected $model;

    /**
     * Relational Database System connection concern
     */
    use ConnectionConcern;

    /**
     * AbstractRepository constructor.
     */
    public function __construct()
    {
        if(is_null($this->capsule))
            $this->init();
    }
}