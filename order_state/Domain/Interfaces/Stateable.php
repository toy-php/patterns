<?php

namespace Domain\Interfaces;

interface Stateable
{

    /**
     * Установить состояние
     * @param int $state
     * @return void
     */
    public function setState(int $state);
}