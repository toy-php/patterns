<?php

namespace Domain;

class OrderStateChanged extends OrderState
{

    /**
     * «Заказ подтвержден и передан на исполнение» – мы приступили к выполнению Вашего заказа.
     */
    public function hasConfirmed()
    {
        $this->order->setState(OrderStates::STATE_CONFIRMED);
    }
}