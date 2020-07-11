<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Foroshtejary]].
 *
 * @see Foroshtejary
 */
class ForoshTejaryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Foroshtejary[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Foroshtejary|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
