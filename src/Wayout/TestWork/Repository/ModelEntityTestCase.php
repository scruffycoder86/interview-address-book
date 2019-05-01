<?php

namespace Distinc\Wayout\TestWork\Repository;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * Class ModelEntityTestCase
 *
 * @package Distinc\Wayout\TestWork\Repository
 */
abstract class ModelEntityTestCase extends TestCase
{
    private $container;

    public function __construct(string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->container = $this->createContainer();
    }

    /**
     * @return mixed
     */
    abstract protected function createContainer(): ContainerInterface;
}