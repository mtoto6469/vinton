<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Host]].
 *
 * @see Host
 */
class HostQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Host[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Host|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
