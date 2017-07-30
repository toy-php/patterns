<?php

namespace Domain;

class OrderStateConfirmed extends OrderState
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

    /**
     * «Заказ отменен клиентом» – мы получили запрос от Вас и отменили заказ.
     */
    public function hasCanceledByClient()
    {
        $this->order->setState(OrderStates::STATE_CANCELED_BY_CLIENT);
    }

    /**
     * «Заказ отменен по техническим причинам» – случилась серьезная техническая проблема.
     */
    public function hasCanceledByTechnicalReason()
    {
        $this->order->setState(OrderStates::STATE_CANCELED_BY_TECHNICAL_REASON);
    }

}