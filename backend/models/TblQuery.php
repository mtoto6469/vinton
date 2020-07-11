<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[TblShomare]].
 *
 * @see TblShomare
 */
class TblQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TblShomare[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TblShomare|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
