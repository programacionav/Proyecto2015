<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Administración del personal',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'About', 'url' => ['/site/about']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?php /*= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ])*/ ?>
            
            <?php
NavBar::begin();
echo Nav::widget([
    'items' => [
        /*['label' => 'Especialidades',
            'items'=>[
                ['label' => 'Administrar', 'url' => ['especialidades/index']]
                     ],
            'options'=>["class"=>'dropdown-toggle']
            ],*/
        ['label' => 'Empleados',
            'items'=>[
                ['label' => 'Administrar', 'url' => ['empleados/create']],
                ['label' => 'Doctores', 'url' => ['doctores/index']],
                ['label' => 'Enfermeros', 'url' => ['enfermeros/index']],
                ['label' => 'Especialidades', 'url' => ['especialidades/index']]
                ],
            'options'=>["class"=>'dropdown-toggle']
            ],
        ['label' => 'Licencias',
            'items'=>[
                ['label' => 'Licenciados', 'url' => ['licencias/index']],
                ['label' => 'Pendientes', 'url' => ['licencias/create']],
                ['label' => 'Historial', 'url' => ['licencias/index']],
                     ],
            'options'=>["class"=>'dropdown-toggle']
            ],
        
        
    ],
    'options'=>['class'=>'nav navbar-nav']
]);
NavBar::end();
?>
            
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
