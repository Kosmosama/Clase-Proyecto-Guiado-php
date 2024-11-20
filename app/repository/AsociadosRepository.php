<?php
namespace kosmo\app\repository;
use kosmo\core\database\QueryBuilder;
use kosmo\app\entity\Asociado;

class AsociadosRepository extends QueryBuilder
{
    /**
     * @param string $table
     * @param string $classEntity
     */
    public function __construct(string $table = 'asociados', string $classEntity = Asociado::class)
    {
        parent::__construct($table, $classEntity);
        //#TODO No va pq no hay asociados
    }
}
