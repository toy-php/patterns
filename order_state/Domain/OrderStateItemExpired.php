<?php

namespace Domain;

class OrderStateItemExpired extends OrderState
{

    /**
     * «Заказ не выдан клиенту, требуется уточнение» – в день доставки товар не был передан Вам и вернулся на склад,
     * ожидайте звонка нашего оператора.
     */
    public function hasReturned()
    {
        $this->order->setState(OrderStates::STATE_RETURNED);
    }

}