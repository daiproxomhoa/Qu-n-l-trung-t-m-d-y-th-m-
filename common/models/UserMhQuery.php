<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[dangki]].
 *
 * @see dangki
 */
class UserMhQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return dangki[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return dangki|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
