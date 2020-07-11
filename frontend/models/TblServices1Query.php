<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[TblServices1]].
 *
 * @see TblServices1
 */
class TblServices1Query extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TblServices1[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TblServices1|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
