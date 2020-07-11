<?php 
namespace frontend\models;
use Yii;
use yii\base\Model;
use common\models\User;
    
class PasswordForm extends Model
{
        public $username;
        public $oldpass;
        public $newpass;
        public $repeatnewpass;
        
        public function rules()
        {
            return [
                [['oldpass','newpass','repeatnewpass','username'],'required'],
                ['oldpass','findPasswords'],
                ['newpass', 'match', 'pattern' => '/^[\*a-zA-Z0-9]{6,14}$/' , 'message' => ' رمز عبور شما باید شامل حداقل  6 عدد باشد'],
                ['repeatnewpass', 'match', 'pattern' => '/^[\*a-zA-Z0-9]{6,14}$/' , 'message' => 'رمز عبور شما باید شامل حداقل  6 عدد باشد'],
//                ['newpass','string','min' => 6],
                ['repeatnewpass','compare','compareAttribute'=>'newpass'],
                [['oldpass','newpass','repeatnewpass','username'],'string']

            ];
        }
        
        public function findPasswords($attribute, $params)
        {
            $user = User::find()->where([
                'username'=>$this->username
            ])->one();
             $password = $user->password_hash;
            if(!Yii::$app->security->validatePassword($this->oldpass, $password))
                $this->addError($attribute,'رمز عبور قدیمی معتبر نیست');
        }
        
        public function attributeLabels()
        {
            return [
                'username'=>'نام کاربری',
                'oldpass'=>'رمز عبور قدیمی',
                'newpass'=>'رمز جدید',
                'repeatnewpass'=>'تکرار رمز جدید',
            ];
        }
}