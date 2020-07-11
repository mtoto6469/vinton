<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Ameliyateforosh]].
 *
 * @see Ameliyateforosh
 */
class AmeliyateForoshQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Ameliyateforosh[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Ameliyateforosh|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
