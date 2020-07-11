<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Mosaede]].
 *
 * @see Mosaede
 */
class MosaedeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Mosaede[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Mosaede|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
