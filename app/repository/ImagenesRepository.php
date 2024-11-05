<?php
namespace kosmo\app\repository;
use kosmo\app\entity\Imagen;
use kosmo\app\entity\Categoria;
use kosmo\app\repository\CategoriasRepository;
use kosmo\core\database\QueryBuilder;

class ImagenesRepository extends QueryBuilder
{
    public function __construct(string $table = 'imagenes', string $classEntity = Imagen::class)
    {
        parent::__construct($table, $classEntity);
    }

    public function getCategoria(Imagen $imagenGaleria): Categoria
    {
        $categoriaRepository = new CategoriasRepository();
        return $categoriaRepository->find($imagenGaleria->getCategoria());
    }

    public function guarda(Imagen $imagenGaleria)
    {
        $fnGuardaImagen = function () use ($imagenGaleria) { // Creamos una función anónima que se llama como callable
            $categoria = $this->getCategoria($imagenGaleria);
            $categoriaRepository = new CategoriasRepository();
            $categoriaRepository->nuevaImagen($categoria);
            $this->save($imagenGaleria);
        };
        $this->executeTransaction($fnGuardaImagen); // Se pasa un callable
    }
}
