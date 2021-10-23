<?php


namespace app\commands;


use yii\rbac\Rule;

class AuthorRule extends Rule
{
    public $name = 'isAuthors';
    public $squads = 'isSquad';
    /**
     * @param string|integer $user ID пользователя.
     * @param Item $item роль или разрешение с которым это правило ассоциировано
     * @param array $params параметры, переданные в ManagerInterface::checkAccess(), например при вызове проверки
     * @return boolean a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        return isset($params['post']) ? $params['post']->id_user == $user : false;
    }
        public function executes($user, $item, $params)
    {
        return isset($params['squad']) ? $params['squad']->id_stab == $user : false;
    }
}