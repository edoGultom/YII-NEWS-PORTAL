<?php
namespace backend\models;

use yii\base\InvalidArgumentException;
use yii\base\Model;
use common\models\User;
use common\models\Pengguna;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password;
    public $re_password;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password', 're_password'], 'required'],
            [['password', 're_password'], 'string', 'min' => 6],
            ['re_password', 'compare', 'compareAttribute' => 'password'],
        ];
    }
}
