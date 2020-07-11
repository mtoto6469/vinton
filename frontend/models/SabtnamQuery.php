<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Sabtnam]].
 *
 * @see Sabtnam
 */
class SabtnamQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Sabtnam[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Sabtnam|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
