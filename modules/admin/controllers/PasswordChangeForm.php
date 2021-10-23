<?php


namespace app\modules\admin\controllers;

use app\modules\admin\models\Admin;
use yii\base\Exception;
use yii\base\Model;
use yii\db\ActiveQuery;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 *
 * @property mixed $password
 */
class PasswordChangeForm extends Model
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],

            ],

            //Доступ только для админов
            [
                'class' => AccessControl::className(),

                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin', 'mehan', 'regstab', 'udgu', 'ggpi', 'egida'],
                    ],
                ],

            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public $currentPassword;
    public $newPassword;
    public $newPasswordRepeat;

    /**
     * @var Admin
     */
    private $_user;

    /**
     * @param Admin $user
     * @param array $config
     */
    public function __construct(Admin $user, $config = [])
    {
        $this->_user = $user;
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['currentPassword', 'newPassword', 'newPasswordRepeat'], 'required'],
            ['currentPassword', 'currentPassword'],
            ['newPassword', 'string', 'min' => 6],
            ['newPasswordRepeat', 'compare', 'compareAttribute' => 'newPassword'],
            ['currentPassword', 'string', 'max' => 255],
            ['newPassword', 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'newPassword' => Yii::t('app', 'Новый пароль'),
            'newPasswordRepeat' => Yii::t('app', 'Повторить пароль'),
            'currentPassword' => Yii::t('app', 'Текущий пароль'),
        ];
    }

    /**
     * @param string $attribute
     * @param array $params
     */
    public function currentPassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if (!$this->_user->validatePassword($this->$attribute)) {
                $this->addError($attribute, Yii::t('app', 'ERROR_WRONG_CURRENT_PASSWORD'));
            }
        }
    }

    /**
     * @return boolean
     */
    public function changePassword()
    {
        if ($this->validate()) {
            $user = $this->_user;
            $user->setPassword($this->newPassword);
            return $user->save();
        } else {
            return false;
        }
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * @param string $attribute
     * @param array $params
     */
    public function changeValidatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if (!$this->validatePassword($this->$attribute)) {
                $this->addError($attribute, Yii::t('app', 'Пароли не совпадают'));
            }
        }
    }

    public function setPassword($password){
        try {
            $this->password = Yii::$app->getSecurity()->generatePasswordHash($password);
        } catch (Exception $e) {
        }
    }

}