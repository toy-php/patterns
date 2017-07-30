<?php

namespace Domain;

class OrderStateReturned extends OrderState
{

    public function isChanged()
    {
        $this->order->setState(OrderStates::STATE_CHANGED);
    }

    public function isDelivered()
    {
        $this->order->setState(OrderStates::STATE_DELIVERED);
    }
}