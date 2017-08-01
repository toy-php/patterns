Реализация ABAC для контроля доступа к ресурсам

Пример использования:

```php

$accessControl = new \Domain\AccessControl();

$accessControl->registerRule(\Domain\BlogPost::class, 'read', function (){
    return true; // Разрешаем всем читать пост
});

$accessControl->registerRule(\Domain\BlogPost::class, 'create', function (\Domain\BlogPost $resource, \Domain\User $user){
    return (
        empty($resource->id) // Проверяем что пост новый
        and !empty($user->id) // Разрешаем добавлять пост авторизованным
        and !$user->isBaned // Проверяем бан пользователя
    );
});

$accessControl->registerRule(\Domain\BlogPost::class, 'update', function (\Domain\BlogPost $resource, \Domain\User $user){
    $dateCreated = new DateTime($resource->dateCreated);
    $dateAllow = new DateTime("now");
    $dateAllow->modify('-1 hour');
    return (
        !empty($resource->id) // Проверяем что пост существующий
        and !empty($user->id) // Проверяем что пользователь авторизован
        and $resource->userId === $user->id // Проверяем что пост пользователя который его создал
        and !$user->isBaned // Проверяем бан пользователя
        and $dateCreated > $dateAllow // Разрешаем изменять пост не позже 1 часа после создания
    );
});

$accessControl->registerRule(\Domain\BlogPost::class, 'delete', function (\Domain\BlogPost $resource, \Domain\User $user){
    $dateCreated = new DateTime($resource->dateCreated);
    $dateAllow = new DateTime("now");
    $dateAllow->modify('-1 hour');
    return (
        !empty($resource->id) // Проверяем что пост существующий
        and !empty($user->id) // Проверяем что пользователь авторизован
        and $resource->userId === $user->id // Проверяем что пост пользователя который его создал
        and !$user->isBaned // Проверяем бан пользователя
        and $dateCreated > $dateAllow // Разрешаем удалять пост не позже 1 часа после создания
    );
});


$blogPost = new \Domain\BlogPost();

$user = new \Domain\User();

echo '<p>';
if($accessControl->isAccess('read', $blogPost, $user)){
    echo $blogPost->read();
}else{
    echo 'Чтение ресурса запрещено';
}
echo '</p>';

echo '<p>';
if($accessControl->isAccess('create', $blogPost, $user)){
    echo $blogPost->create();
}else{
    echo 'Создание ресурса запрещено';
}
echo '</p>';

echo '<p>';
if($accessControl->isAccess('update', $blogPost, $user)){
    echo $blogPost->update();
}else{
    echo 'Изменение ресурса запрещено';
}
echo '</p>';

echo '<p>';
if($accessControl->isAccess('delete', $blogPost, $user)){
    echo $blogPost->delete();
}else{
    echo 'Удаление ресурса запрещено';
}
echo '</p>';

```