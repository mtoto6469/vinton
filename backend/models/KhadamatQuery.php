<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Khadamat]].
 *
 * @see Khadamat
 */
class KhadamatQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Khadamat[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Khadamat|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
