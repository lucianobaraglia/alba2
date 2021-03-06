<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inasistencia".
 *
 * @property integer $id
 * @property integer $alumno_id
 * @property integer $seccion_id
 * @property integer $valor_inasistencia_id
 * @property integer $justificada
 * @property string $fecha
 *
 * @property Alumno $alumno
 * @property Seccion $seccion
 * @property ValorInasistencia $valorInasistencia
 */
class Inasistencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inasistencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alumno_id', 'seccion_id', 'valor_inasistencia_id', 'fecha'], 'required'],
            [['alumno_id', 'seccion_id', 'valor_inasistencia_id', 'justificada'], 'integer'],
            [['fecha'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'alumno_id' => Yii::t('app', 'Alumno ID'),
            'seccion_id' => Yii::t('app', 'Seccion ID'),
            'valor_inasistencia_id' => Yii::t('app', 'Valor Inasistencia ID'),
            'justificada' => Yii::t('app', 'Justificada'),
            'fecha' => Yii::t('app', 'Fecha'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(Alumno::className(), ['id' => 'alumno_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeccion()
    {
        return $this->hasOne(Seccion::className(), ['id' => 'seccion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getValorInasistencia()
    {
        return $this->hasOne(ValorInasistencia::className(), ['id' => 'valor_inasistencia_id']);
    }
}
