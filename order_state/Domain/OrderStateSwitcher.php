<?php

namespace Domain;

use Domain\Interfaces\Stateable;

class OrderStateSwitcher
{

    protected $order;
    protected $state;

    public function __construct(Stateable $order)
    {
        $this->order = $order;
        $this->order->setState(OrderStates::STATE_NEW);
        $this->state = new OrderStateNew($this->order);
    }

    /**
     * «Заказ принят» – мы получили Ваш заказ и начали работу над ним.
     */
    public function isAccepted()
    {
        $this->state->hasAccepted();
        $this->state = new OrderStateAccepted($this->order);
    }

    /**
     * «Заказ подтвержден и передан на исполнение» – мы приступили к выполнению Вашего заказа.
     */
    public function isConfirmed()
    {
        $this->state->hasConfirmed();
        $this->state = new OrderStateConfirmed($this->order);
    }

    /**
     * «Заказ доставляется» – машина с Вашим заказом выехала по указанному в заказе адресу.
     */
    public function isDelivered()
    {
        $this->state->hasDelivered();
        $this->state = new OrderStateDelivered($this->order);
    }

    /**
     * «Заказ подготовлен к выдаче» – можно приходить и забирать заказ из магазина или пункта интернет магазина.
     */
    public function isReleaseReady()
    {
        $this->state->hasReleaseReady();
        $this->state = new OrderStateReleaseReady($this->order);
    }

    /**
     * «Заказ выдан» – Спасибо за покупку! Ждем Вас снова!
     */
    public function isCompleted()
    {
        $this->state->hasCompleted();
        $this->state = new OrderState($this->order);
    }

    /**
     * «Изменение заказа, требуется подтверждение» – возникла необходимость изменить условия заказа и согласовать их с Вами.
     */
    public function isChanged()
    {
        $this->state->hasChanged();
        $this->state = new OrderStateChanged($this->order);
    }

    /**
     * «Заказ не выдан клиенту, требуется уточнение» – в день доставки товар не был передан Вам и вернулся на склад,
     * ожидайте звонка нашего оператора.
     */
    public function isReturned()
    {
        $this->state->hasReturned();
        $this->state = new OrderStateReturned($this->order);
    }

    /**
     * «Заказ отменен клиентом» – мы получили запрос от Вас и отменили заказ.
     */
    public function isCanceledByClient()
    {
        $this->state->hasCanceledByClient();
        $this->state = new OrderState($this->order);
    }

    /**
     * «Заказ отменен. Истек срок хранения товара» – Ваш заказ хранился в магазине до указанной даты и его никто не забрал.
     */
    public function isItemExpired()
    {
        $this->state->hasItemExpired();
        $this->state = new OrderStateItemExpired($this->order);
    }

    /**
     * «Заказ отменен по техническим причинам» – случилась серьезная техническая проблема.
     */
    public function isCanceledByTechnicalReason()
    {
        $this->state->hasCanceledByTechnicalReason();
        $this->state = new OrderState($this->order);
    }
}