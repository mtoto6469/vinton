<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Pishnehadenteqad]].
 *
 * @see Pishnehadenteqad
 */
class PishnehadEnteqadQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Pishnehadenteqad[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Pishnehadenteqad|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
