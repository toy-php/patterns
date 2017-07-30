<?php

namespace Domain;

class OrderStateDelivered extends OrderState
{

    /**
     * «Заказ подготовлен к выдаче» – можно приходить и забирать заказ из магазина или пункта интернет магазина.
     */
    public function isReleaseReady()
    {
        $this->order->setState(OrderStates::STATE_RELEASE_READY);
    }

    /**
     * «Заказ отменен клиентом» – мы получили запрос от Вас и отменили заказ.
     */
    public function isCanceledByClient()
    {
        $this->order->setState(OrderStates::STATE_CANCELED_BY_CLIENT);
    }

    /**
     * «Заказ отменен по техническим причинам» – случилась серьезная техническая проблема.
     */
    public function isCanceledByTechnicalReason()
    {
        $this->order->setState(OrderStates::STATE_CANCELED_BY_TECHNICAL_REASON);
    }
}