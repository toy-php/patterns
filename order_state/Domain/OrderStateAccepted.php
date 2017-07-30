<?php

namespace Domain;

class OrderStateAccepted extends OrderState
{

    /**
     * «Заказ подтвержден и передан на исполнение» – мы приступили к выполнению Вашего заказа.
     */
    public function isConfirmed()
    {
        $this->order->setState(OrderStates::STATE_CONFIRMED);
    }
}