<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Adsl]].
 *
 * @see Adsl
 */
class AdslQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Adsl[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Adsl|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
