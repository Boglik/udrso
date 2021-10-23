<?php


namespace app\modules\kabinet\models;

use app\modules\kabinet\models\User;
use yii\base\Model;
use yii\db\ActiveQuery;
use Yii;

class BlogSite extends Model
{
    public $info;
    public $username;

    /**
     * @var User
     */
    private $_user;

    public function __construct(User $user, $config = [])
    {
        $this->_user = $user;
        $this->info = $user->info;
        $this->username = $user->username;
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            ['info', 'string', 'max' => 255],
            ['username', 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'info' =>'Публикация',
        ];
    }

    public function update()
    {
        if ($this->validate()) {
            $user = $this->_user;
            $user->info = $this->info;
            $user->username = $this->username;
            return $user->save();
        } else {
            return false;
        }
    }
}