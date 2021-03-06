<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\ServicioSaludContacto $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Servicio Salud Contacto',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Servicio Salud Contactos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicio-salud-contacto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
