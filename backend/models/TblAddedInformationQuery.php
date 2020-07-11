<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[TblAddedInformation]].
 *
 * @see TblAddedInformation
 */
class TblAddedInformationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TblAddedInformation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TblAddedInformation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
