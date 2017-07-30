<?php

namespace Domain;

use Domain\Interfaces\Stateable as StateableInterface;

/**
 * Class Order
 * @package Domain
 *
 * Класс заказа, может быть любым, к примеру модель фреймворка yii
 * в этом классе необходимо реализовать интерфейс Stateable
 *
 */
class Order implements StateableInterface
{

    /**
     * Текущее состояние заказа
     * @var int
     */
    private $state;

    /**
     * Получить состояние заказа
     * @return int
     */
    public function getState(): int
    {
        return $this->state;
    }

    /**
     * Установить состояние заказа
     * @param int $state
     */
    public function setState(int $state)
    {
        $this->state = $state;
    }

}