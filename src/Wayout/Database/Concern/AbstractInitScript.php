<?php

namespace Distinc\Wayout\Database\Concern;

use Distinc\Wayout\Concern\ConnectionConcern;

/**
 * Class AbstractInitScript
 *
 * In the near future this file will use a TraversablePipelineInterface
 * as an alternative Migration System that can also migrate data by
 * adopting an RCF Standard such as UUID
 *
 * @package Distinc\Wayout\Database\Concern
 */
abstract class AbstractInitScript
{
    use ConnectionConcern;

    /**
     * @var
     */
    protected $name;

    /**
     * AbstractInitScript constructor.
     */
    public function __construct()
    {
        if(!$this->isInitialized){

            $this->init();
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    abstract public function execute();

    /**
     * @param $table
     * @param \Closure $callback
     */
    protected function create($table, \Closure $callback)
    {
        $this->capsule->connection()->getSchemaBuilder()->create($table, $callback);
    }
}