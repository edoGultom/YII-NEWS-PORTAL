<?php
namespace backend\models;

use yii\base\Model;
use common\models\User;
use common\models\AuthItem;
use common\models\AuthAssignment;
/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    

    public $role;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {

        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            
            ['role','safe'],
            ['role','required'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {


        
        if (!$this->validate()) {
            return null;
        }

        $iduser = 0;
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        if ($user->save(false)){
            $iduser = $user->id;
        }
        
        $array2 = $this->role;
        for ($i=0;$i<count($array2);$i++){
            if (isset($array2[$i])){
                
                $auth = new AuthAssignment();
                $auth->item_name = $array2[$i];
                $auth->user_id = $iduser;
                $auth->created_at = time();
                $auth->save(false);
            }
        }
        
        return true;
    }
}
