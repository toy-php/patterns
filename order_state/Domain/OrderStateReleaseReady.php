<?php

namespace Domain;

class OrderStateReleaseReady extends OrderState
{

    /**
     * «Заказ выдан» – Спасибо за покупку! Ждем Вас снова!
     */
    public function isCompleted()
    {
        $this->order->setState(OrderStates::STATE_COMPLETED);
    }

    /**
     * «Заказ отменен. Истек срок хранения товара» – Ваш заказ хранился в магазине до указанной даты и его никто не забрал.
     */
    public function isItemExpired()
    {
        $this->order->setState(OrderStates::STATE_ITEM_EXPIRED);
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