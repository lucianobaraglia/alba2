<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_alumno".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property Alumno[] $alumnos
 * @property AlumnoEstado[] $alumnoEstados
 */
class EstadoAlumno extends \yii\db\ActiveRecord
{
    const PREINSCRIPTO = 'Preinscripto';
    const INSCRIPTO = 'Inscripto';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_alumno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 45],
            [['descripcion'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnos()
    {
        return $this->hasMany(Alumno::className(), ['estado_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnoEstados()
    {
        return $this->hasMany(AlumnoEstado::className(), ['estado_id' => 'id']);
    }
}
