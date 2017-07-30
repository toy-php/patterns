<?php

namespace Domain;

class OrderStateNew extends OrderState
{
    public function isAccepted()
    {
        $this->order->setState(OrderStates::STATE_ACCEPTED);
    }
}