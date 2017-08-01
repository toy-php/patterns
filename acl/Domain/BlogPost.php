<?php

namespace Domain;

use Domain\Interfaces\Resource as ResourceInterface;

class BlogPost implements ResourceInterface
{

    public $id = '1';
    public $userId = '1';
    public $dateCreated = '2017-08-01 19:16:18';

    public function read()
    {
        return 'Чтение ресурса разрешено';
    }

    public function create()
    {
        return 'Создание ресурса разрешено';
    }

    public function update()
    {
        return 'Изменение ресурса разрешено';
    }

    public function delete()
    {
        return 'Удаление ресурса разрешено';
    }

}