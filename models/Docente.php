<?php

namespace app\models;

/**
 * This is the model class for table "docente".
 *
 * @property integer $id
 * @property integer $persona_id
 * @property string $codigo
 * @property string $fecha_alta
 * @property string $observaciones
 *
 * @property DesignacionDocente[] $designacionDocentes
 * @property Persona $persona
 * @property DocenteEstado[] $docenteEstados
 */
class Docente extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'docente';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['persona_id', 'codigo', 'fecha_alta'], 'required'],
			[['persona_id'], 'integer'],
			[['fecha_alta'], 'safe'],
			[['codigo'], 'string', 'max' => 45],
			[['observaciones'], 'string', 'max' => 255]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'persona_id' => 'Persona ID',
			'codigo' => 'Codigo',
			'fecha_alta' => 'Fecha Alta',
			'observaciones' => 'Observaciones',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getDesignacionDocentes()
	{
		return $this->hasMany(DesignacionDocente::className(), ['docente_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPersona()
	{
		return $this->hasOne(Persona::className(), ['id' => 'persona_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getDocenteEstados()
	{
		return $this->hasMany(DocenteEstado::className(), ['docente_id' => 'id']);
	}
}