<?php


namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use app\modules\admin\models\User;
use yii\db\ActiveQuery;


class ProfileUpdateForm extends Model
{
    public $email;
    public $username;

    /**
     * @var Admin
     */
    private $_user;
//
    public function __construct(Admin $user, $config = [])
    {
        $this->_user = $user;
        $this->email = $user->email;
        $this->username = $user->username;
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'email'],
            [
                'email',
                'unique',
                'targetClass' => User::className(),
                'message' => Yii::t('app', 'Данный email уже существует'),
                'filter' => ['<>', 'id', $this->_user->id],
            ],
            ['email', 'string', 'max' => 255],
            ['username', 'string', 'max' => 255],
        ];
    }

    public function update()
    {
        if ($this->validate()) {
            $user = $this->_user;
            $user->email = $this->email;
            $user->username = $this->username;
            return $user->save();
        } else {
            return false;
        }
    }
}