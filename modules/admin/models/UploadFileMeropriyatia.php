<?php
namespace app\modules\admin\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadFileMeropriyatia extends Model
{
    /**
     * @var UploadedFile
     */
    public $file;

    public function rules()
    {
        return [
            ['file', 'file',
                'extensions' => ['pdf','doc','docx'],
                'checkExtensionByMimeType' => true,
            ],
            [['file'], 'required'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'file' => 'Файл',
        ];
    }
    public function upload()
 {
            if ($this->validate()) {
                $dir = '../../site/web/uploads/'; // Директория - должна быть создана
                $name = $this->fixedFileName($this->file->extension);
                $file = $dir . $name;
                $this->file->saveAs($file); // Сохраняем файл
                return true;
            }
        else {
            return false;
        }
    }
    private function fixedFileName($extension = false)
    {
        $extension = $extension ? '.' . $extension : '';
        do {
            $name = 'План мероприятий УРО МООО РСО';
            $file = $name . $extension;
        } while (file_exists($file));
        return $file;
    }
}