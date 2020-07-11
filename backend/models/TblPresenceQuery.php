<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[TblPresence]].
 *
 * @see TblPresence
 */
class TblPresenceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TblPresence[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TblPresence|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
