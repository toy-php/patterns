<?php

namespace Domain;

class OrderStateItemExpired extends OrderState
{

    public function isReturned()
    {
        $this->order->setState(OrderStates::STATE_RETURNED);
    }

}