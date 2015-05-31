<?php

namespace app\modules\admcapacitaciones\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;

class DefaultController extends Controller
{
	public function behaviors()
	{
		return
			[
				'access' =>
					[
						'class' => \yii\filters\AccessControl::className(),
						'only' => ['index', 'create', 'update', 'delete', 'informacion', 'view'],
						'rules' =>
						[
							[
								'actions' => ['index', 'informacion', 'view'],
								'allow' => true,
								'roles' => ['@'],
							],
							[
								'actions' => ['create', 'update', 'delete'],
								'allow' => true,
								'roles' => ['@'],
								'matchCallback' =>
								function ($rule, $action)
									{
										$valid_roles = [Usuarios::ROLE_ADMIN];
										return Usuarios::roleInArray($valid_roles);
									}
							],
						],
					],
			];
	}
    public function actionIndex()
    {
        return $this->render('index');
    }
}
