<?php


namespace app\modules\controllers;

use Yii;
use app\modules\admin\models\Squad;
use app\modules\admin\models\SquadSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class AuthorAccessRule extends \yii\filters\AccessRule
{
    public $allow = true;  // Allow access if this rule matches
    public $roles = ['user']; // Ensure user is logged in.

    public function allows($action, $user, $request)
    {
        $parentRes = parent::allows($action, $user, $request);
        // $parentRes can be `null`, `false` or `true`.
        // True means the parent rule matched and allows access.
        if ($parentRes !== true) {
            return $parentRes;
        }
        return ($this->getProjectAuthorId($request) == $user->id);
    }

    private function getProjectAuthorId($request)
    {
        // Fill in code to receive the right project.
        // assuming the project id is given à la `project/update?id=1`
        $projectId = $request->get('id');
        $project = Squad::findOne($projectId);
        return isset($project) ? $project->id : null;
    }
}