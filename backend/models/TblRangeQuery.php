<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[TblRange]].
 *
 * @see TblRange
 */
class TblRangeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TblRange[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TblRange|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
