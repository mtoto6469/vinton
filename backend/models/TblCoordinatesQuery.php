<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[TblCoordinates]].
 *
 * @see TblCoordinates
 */
class TblCoordinatesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TblCoordinates[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TblCoordinates|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
