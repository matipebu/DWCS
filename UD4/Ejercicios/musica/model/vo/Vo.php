<?php
namespace Ejercicios\Musica\Model\Vo;
interface Vo
{
    public function toArray(): array;
    public static function fromArray(array $data);

    public function updateVoParams(Vo $vo);

}