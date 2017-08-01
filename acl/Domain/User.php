<?php

namespace Domain;

use Domain\Interfaces\User as UserInterface;

class User implements UserInterface
{

    /**
     * Идентификатор пользователя
     * @var string
     */
    public $id = '1';

    public $isBaned = false;

}