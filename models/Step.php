<?php
namespace app\models;

use app\modules\kabinet\models\Squad;
use Yii;
use yii\base\Model;


/**
 * Signup form
 */
class Step extends Model
{
    public $username;

    /**
     * @var Squad
     */
    private $_user;
//
    public function __construct(Squad $user, $config = [])
    {
        $this->_user = $user;
        parent::__construct($config);
    }

    public function rules()
    {
        return [
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
            $user->username = $this->username;
            return $user->save();
        } else {
            return false;
        }
    }
}
