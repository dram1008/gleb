<?php

namespace app\controllers;

use app\models\Article;
use app\models\File;
use app\models\Page;
use app\models\SiteUpdate;
use app\services\Subscribe;
use cs\services\VarDumper;
use cs\web\Exception;
use Yii;
use yii\base\UserException;

class Admin_filesController extends AdminBaseController
{
    public function actionIndex()
    {
        return $this->render([
            'items' => File::query()->all(),
        ]);
    }

    public function actionAdd()
    {
        $model = new \app\models\Form\File();
        if ($model->load(Yii::$app->request->post()) && $model->insert()) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render([
                'model' => $model,
            ]);
        }
    }

    public function actionEdit($id)
    {
        $model = \app\models\Form\File::find($id);
        if ($model->load(Yii::$app->request->post()) && $model->update()) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render([
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        \app\models\Form\File::find($id)->delete();

        return self::jsonSuccess();
    }
}
