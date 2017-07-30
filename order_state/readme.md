Реализация state machine для изменения статуса заказа в интернет магазине.

Инициализация:

```php

$order = new \Domain\Order();

$stateSwitcher = new \Domain\StateSwitcher($order);

// Берем на исполнение
$stateSwitcher->isAccepted();

// Клиент подтвердил намерение покупки
$stateSwitcher->isConfirmed();

// В данный момент бросится исключение
// т.к. заказ не прошел промежуточные состояния
$stateSwitcher->isCompleted();

```

Схема state flow:
![](./state_flow.png)
