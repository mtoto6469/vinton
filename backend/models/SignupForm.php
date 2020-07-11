<?php
namespace backend\models;

use backend\models\Profile;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $roles;
    public $name;
    public $lastname;
    public $semat;
    public $namepedar;
    public $codemeli;
    public $cellphone1;
    public $phone;
    public $id_phone;
    public $id_mantaqe;
    public $shahr;
    public $ostan;
    public $enableview;
    public $hoquq;
    public $timeWork;

    public $saatkari_az;
    public $saatkari_ta;
    public $shomarepersenel;

    public $nahveashnaee;
    public $ax_persenli;
    public $ax_kartmeli;
    public $tarikhsabt_karmand;
    public $tarikhsabt_karmand2;
    public $adress;
    public $hurFrom;
    public $minFrom;
    public $hurTo;
    public $minTo;





    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required', 'message' => 'نام کاربری نمی تواند خالی باشد.'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'نام کاربری تکراری می باشد.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required', 'message' => 'ایمیل نمی تواند خالی باشد.'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'ایمیل وارد شده تکراری می باشد.'],

            ['password', 'required', 'message' => 'پسورد نمی تواند خالی باشد.'],
            ['password', 'string', 'min' => 6],

            [['roles','timeWork'],'string', 'max'=>255],


            ['minTo', 'number', 'max' => 60],
            ['hurTo', 'integer', 'max' => 24],
            ['minFrom', 'integer', 'max' => 60],
            ['hurFrom', 'integer', 'max' => 24],
            
            [['name', 'lastname', 'semat', 'namepedar', 'codemeli', 'cellphone1',
              'phone', 'saatkari_az', 'saatkari_ta', 'shomarepersenel',
              'tarikhsabt_karmand', 'tarikhsabt_karmand2','shahr','ostan'], 'required'],

            [['codemeli', 'cellphone1', 'phone', 'id_phone','id_mantaqe','enableview','hoquq'], 'integer'],

            [[ 'tarikhsabt_karmand'], 'safe'],

            [['name', 'lastname', 'semat', 'namepedar', 'shomarepersenel',
             'nahveashnaee', 'ax_persenli', 'ax_kartmeli', 'tarikhsabt_karmand2','shahr','ostan','saatkari_az', 'saatkari_ta'], 'string', 'max' => 400],

            [['adress'], 'string', 'max' => 500],



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
//      var_dump($this->getErrors());exit;
            return null;
        }

        $user = new User();

        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        $auth=Yii::$app->authManager;
        $authoRole=$auth->getRole($this->roles);
        if($user->save())
        {

           $auth->assign($authoRole,$user->id);
           $profile= new Profile();
           $profile1= Profile::find()->all();
           $profile->name=$this->name;
           $profile->lastname=$this->lastname;
           $profile->id_user=$user->getId();
           $profile->semat=$this->semat;
           $profile->namepedar=$this->namepedar;

            $codemeli= $this->codemeli;
            $conut= strlen( $codemeli);
            if($conut == 10){
                $number= 0;
                $x=10;
                for($i=0; $i<=8 ; $i++){


                    $number = ($codemeli[$i] * $x)+$number;
                    $x=$x-1;


                }
                $number1=$number%11;
                if($number1 >= 2){
                    $number_controller = 11 - $number1;

                    if(  $number_controller == $codemeli[9]){

                        $profile->codemeli=$this->codemeli;

                    }
                    else{

                        $user->delete();
                        $_SESSION['error']='کد ملی وارد شده معتبر نمی باشد.';
                        return null;

                    }

                }
                else{

                    if($number1 == $codemeli[9]){

                        $profile->codemeli=$this->codemeli;

                    }
                    else{

                        $user->delete();
                        $_SESSION['error']='کد ملی وارد شده معتبر نمی باشد.';
                        return null;
                    }
                }



            }
            else{

                $user->delete();
                $_SESSION['error']='کد ملی وارد شده باید 10 رقم باشد.';
                return null;
            }




           $profile->cellphone=$this->cellphone1;
           $profile->id_phone=$this->id_phone;
           $profile->phone=$this->phone;
           $profile->id_mantaqe=$this->id_mantaqe;
           $profile->saatkari_az=$this->saatkari_az;
           $profile->saatkari_ta=$this->saatkari_ta;
            $profile->timeWork=$this->saatkari_az." ".$this->saatkari_ta;
//            $pro->timeWork = $this->hurFrom .':'.$this->minFrom." ".$this->hurTo.":".$this->minTo;
            foreach ($profile1 as $p){
                if( $p->shomarepersenel == $this->shomarepersenel){
                    $user->delete();
                    $_SESSION['error']='شماره پرسنلی تکراری می باشد.';
                    return null;
                }
            }
           $profile->shomarepersenel=$this->shomarepersenel;
           $profile->shahr=$this->shahr;
           $profile->ostan=$this->ostan;
           $profile->hoquq=$this->hoquq;
           $profile->enableview=1;

           $profile->nahveashnaee='void';
           $profile->ax_perseneli=$this->ax_persenli;
           $profile->ax_kartmeli=$this->ax_kartmeli;
           $profile->tarikhsabt_karmand=$this->tarikhsabt_karmand;
           $profile->tarikhsabt_karmand2=$this->tarikhsabt_karmand2;
           $profile->adress=$this->adress;
            $profile->username=$this->username;
            $profile->email=$this->email;
            $profile->password=$this->password;

            if($profile->save()){
//                var_dump($profile->getErrors());exit;
                return $user;
            }
            else{
//                var_dump($profile->getErrors());exit;
                $user->delete();
//                var_dump($profile->getErrors());exit;


               $_SESSION['error']='ثبت نام انجام نشد. ';
                return null;
            }


        }
        else
        {


//            $_SESSION['error']='ایمیل وارد شده تکراری می باشد';


            return null;

        }

        
//        return $user->save() ? $user : null;
    }
}
