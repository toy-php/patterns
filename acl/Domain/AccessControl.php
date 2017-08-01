<?php

namespace Domain;

use Domain\Interfaces\Resource as ResourceInterface;
use Domain\Interfaces\User as UserInterface;

class AccessControl
{

    protected $rules = [];

    /**
     * Регистрация правила
     * @param string $resourceClass имя класса-ресурса для которого создается правило
     * @param string $action действие для которого создается правило
     * @param callable $rule правило - функция, которая должна вернуть bool
     */
    public function registerRule(string $resourceClass, string $action, callable $rule)
    {
        $this->rules[$resourceClass][$action] = $rule;
    }

    /**
     * Проверка наличия прав доступа к методу класса-ресурса
     * @param string $action действие которое хотим совершить
     * @param ResourceInterface $resource объект ресурса, по отношению к которому хотим совершить действие
     * @param UserInterface $user пользователь от имени которого совершается действие
     * @return bool
     */
    public function isAccess(string $action, ResourceInterface $resource, UserInterface $user): bool
    {
        $resourceClass = get_class($resource);
        if (isset($this->rules[$resourceClass]) and $this->rules[$resourceClass][$action]) {
            return $this->rules[$resourceClass][$action]($resource, $user);
        }
        return false;
    }

}