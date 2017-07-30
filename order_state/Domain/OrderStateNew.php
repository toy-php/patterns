<?php

namespace Domain;

class OrderStateNew extends OrderState
{

    /**
     * «Заказ принят» – мы получили Ваш заказ и начали работу над ним.
     */
    public function hasAccepted()
    {
        $this->order->setState(OrderStates::STATE_ACCEPTED);
    }
}