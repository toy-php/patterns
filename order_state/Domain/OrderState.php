<?php

namespace Domain;

use Domain\Interfaces\Stateable as StateableInterface;

/**
 * Class OrderState
 * @package Domain
 *
 * Базовый класс состояний.
 * В данном классе описаны все возможные методы меняющие состояние
 * при этом они не должны содержать логику, и должны бросать исключения
 * о невозможности изменения состояния.
 * Наследники будут перекрывать необходимые методы, реализуя изменение состояния
 *
 */
class OrderState
{

    protected $order;

    public function __construct(StateableInterface $order)
    {
        $this->order = $order;
    }

    /**
     * «Заказ принят» – мы получили Ваш заказ и начали работу над ним.
     */
    public function hasAccepted()
    {
        throw new StateException('Сейчас нельзя установить это состояние');
    }

    /**
     * «Заказ подтвержден и передан на исполнение» – мы приступили к выполнению Вашего заказа.
     */
    public function hasConfirmed()
    {
        throw new StateException('Сейчас нельзя установить это состояние');
    }

    /**
     * «Заказ доставляется» – машина с Вашим заказом выехала по указанному в заказе адресу.
     */
    public function hasDelivered()
    {
        throw new StateException('Сейчас нельзя установить это состояние');
    }

    /**
     * «Заказ подготовлен к выдаче» – можно приходить и забирать заказ из магазина или пункта интернет магазина.
     */
    public function hasReleaseReady()
    {
        throw new StateException('Сейчас нельзя установить это состояние');
    }

    /**
     * «Заказ выдан» – Спасибо за покупку! Ждем Вас снова!
     */
    public function hasCompleted()
    {
        throw new StateException('Сейчас нельзя установить это состояние');
    }

    /**
     * «Изменение заказа, требуется подтверждение» – возникла необходимость изменить условия заказа и согласовать их с Вами.
     */
    public function hasChanged()
    {
        throw new StateException('Сейчас нельзя установить это состояние');
    }

    /**
     * «Заказ не выдан клиенту, требуется уточнение» – в день доставки товар не был передан Вам и вернулся на склад,
     * ожидайте звонка нашего оператора.
     */
    public function hasReturned()
    {
        throw new StateException('Сейчас нельзя установить это состояние');
    }

    /**
     * «Заказ отменен клиентом» – мы получили запрос от Вас и отменили заказ.
     */
    public function hasCanceledByClient()
    {
        throw new StateException('Сейчас нельзя установить это состояние');
    }

    /**
     * «Заказ отменен. Истек срок хранения товара» – Ваш заказ хранился в магазине до указанной даты и его никто не забрал.
     */
    public function hasItemExpired()
    {
        throw new StateException('Сейчас нельзя установить это состояние');
    }

    /**
     * «Заказ отменен по техническим причинам» – случилась серьезная техническая проблема.
     */
    public function hasCanceledByTechnicalReason()
    {
        throw new StateException('Сейчас нельзя установить это состояние');
    }

}