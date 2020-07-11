<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[FactorNgn]].
 *
 * @see FactorNgn
 */
class FactorNgnQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return FactorNgn[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return FactorNgn|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
