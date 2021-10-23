<?php

namespace app\modules\admin\models;

use app\modules\admin\models\Admin;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class UploadForm extends ActiveRecord
{
    public static function TableName() {
            return '{{admin}}';
        }

    public $avatar;
    private $_user;
    public $imageFile;

    public function __construct(Admin $user, $config = [])
    {
        $this->_user = $user;
        $this->avatar = $user->avatar;
        parent::__construct($config);
    }


    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $dir = 'uploads/avatars/'; // Директория - должна быть создана
            $name = $this->randomFileName($this->imageFile->extension);
            $file = $dir . $name;
            $this->imageFile->saveAs($file); // Сохраняем файл
            $this->_user->avatar = $name;
            $this->_user->save();
            return true;
        } else {
            return false;
        }
    }

    private function randomFileName($extension = false)
    {
        $extension = $extension ? '.' . $extension : '';
        do {
            $name = md5(microtime() . rand(0, 1000));
            $file = $name . $extension;
        } while (file_exists($file));
        return $file;
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'imageFile' => 'Изображение',
        ];
    }
}