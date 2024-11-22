<?php
namespace kosmo\app\repository;

use kosmo\core\database\QueryBuilder;
use kosmo\app\entity\Usuario;

use kosmo\app\exceptions\NotFoundException;
use kosmo\app\exceptions\QueryException;

class UsuariosRepository extends QueryBuilder
{
    /**
     * Constructor de UsuarioRepository
     *
     * @param string $table
     * @param string $classEntity
     */
    public function __construct(string $table = 'usuarios', string $classEntity = Usuario::class)
    {
        parent::__construct($table, $classEntity);
    }

    /**
     * Guarda un nuevo usuario en la base de datos.
     *
     * @param Usuario $usuario
     * @throws QueryException
     */
    public function guarda(Usuario $usuario)
    {
        $fnGuardaUsuario = function () use ($usuario) {
            $this->save($usuario);
        };
        $this->executeTransaction($fnGuardaUsuario);
    }

    /**
     * Obtiene un usuario por su ID.
     *
     * @param int $id
     * @return Usuario
     * @throws NotFoundException
     * @throws QueryException
     */
    public function getUsuarioPorId(int $id): Usuario
    {
        return $this->find($id);
    }

}