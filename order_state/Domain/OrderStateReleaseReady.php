<?php

namespace Domain;

class OrderStateReleaseReady extends OrderState
{

    /**
     * «Заказ выдан» – Спасибо за покупку! Ждем Вас снова!
     */
    public function hasCompleted()
    {
        $this->order->setState(OrderStates::STATE_COMPLETED);
    }

    /**
     * «Заказ отменен. Истек срок хранения товара» – Ваш заказ хранился в магазине до указанной даты и его никто не забрал.
     */
    public function hasItemExpired()
    {
        $this->order->setState(OrderStates::STATE_ITEM_EXPIRED);
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