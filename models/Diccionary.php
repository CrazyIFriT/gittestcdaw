<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diccionary".
 *
 * @property int $id
 * @property string $word
 * @property string $language
 * @property string $translate
 */
class Diccionary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diccionary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['word', 'language', 'translate'], 'string', 'max' => 255],
            [['word', 'language', 'translate'], 'required'],
            ['word', 'unique','targetAttribute' => ['word','language']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'word' => Yii::t('app', 'Word'),
            'language' => Yii::t('app', 'Language'),
            'translate' => Yii::t('app', 'Translate'),
        ];
    }

    public static function translate($word, $language){
        $model = Diccionary::findOne(['language' => $language, 'word' => $word]);
        if($model){
            return $model->translate;
        } else {
            return $word;
        }
    }
}
