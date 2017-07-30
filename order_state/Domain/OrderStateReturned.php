<?php

namespace Domain;

class OrderStateReturned extends OrderState
{

    /**
     * «Изменение заказа, требуется подтверждение» – возникла необходимость изменить условия заказа и согласовать их с Вами.
     */
    public function hasChanged()
    {
        $this->order->setState(OrderStates::STATE_CHANGED);
    }

    /**
     * «Заказ доставляется» – машина с Вашим заказом выехала по указанному в заказе адресу.
     */
    public function hasDelivered()
    {
        $this->order->setState(OrderStates::STATE_DELIVERED);
    }
}