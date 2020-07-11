<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ameliyate_forosh".
 *
 * @property int $id
 * @property int $id_user
 * @property string $eshterak
 * @property string $type
 * @property string $ostan
 * @property string $shahr
 * @property int $lng
 * @property int $lat
 * @property string $name
 * @property string $lastname
 * @property string $namepedar
 * @property string $codemeli
 * @property string $shomare_shenasname
 * @property string $tarikh_tavalod
 * @property string $mahale_sodur
 * @property string $cellphone
 * @property int $telegram1
 * @property string $cellphone2
 * @property int $telegram2
 * @property string $phone_majmue
 * @property int $faks
 * @property string $phone_majmue2
 * @property int $faks2
 * @property string $phone
 * @property string $email
 * @property string $adress
 * @property string $saat_az
 * @property string $saat_ta
 * @property string $ax_kartmeli_ro
 * @property string $ax_kartmeli_posht
 * @property string $ax_modir1
 * @property string $ax_modir2
 * @property string $sayer
 * @property string $tarefe
 * @property string $logo
 * @property string $namaye_dakheli1
 * @property string $namaye_dakheli2
 * @property string $namaye_khareji1
 * @property string $namaye_khareji2
 * @property string $saat_kari
 * @property string $sayer2
 * @property string $name_hozeye_faaliyat
 * @property string $hamkari_ba_sherkat
 * @property string $ashnaee_kodam_service
 * @property string $moqeiyate_makani
 * @property int $moqeiyate_tablo
 * @property string $ax_emza
 * @property int $kharid_az_sherkat
 * @property string $tavanaee_forosh_kodam_service
 * @property int $price
 * @property string $date_farsi
 * @property string $date
 * @property string $mahale
 * @property string $dastebandi_shoqli
 * @property string $namayande_kodam_sherkat
 * @property string $discription
 * @property string $name_persenel
 * @property string $lastname_persenel
 * @property string $name_pedar_persenel
 * @property string $codemeli_persenel
 * @property string $shomareshenasname_persenel
 * @property string $tarikhe_tavalod_persenel
 * @property string $mahale_sodur_persenel
 * @property int $faaliyat_tamvaqt
 * @property int $tavanaee_beruzresani_mahsulat
 * @property int $aya_berand
 * @property string $name_berand
 * @property string $logo_berand
 * @property int $tavanee_ekhtiyargozashtan_mahsulat
 * @property string $moaref
 * @property string $ax_kartmeli_modir
 * @property string $ax_kartmeli_persenel
 * @property string $ax_tabloye_biruni
 * @property int $lng2
 * @property int $lat2
 */
class Ameliyateforosh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ameliyate_forosh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'eshterak', 'type', 'ostan', 'shahr', 'lng', 'lat', 'name', 'lastname', 'namepedar', 'codemeli', 'shomare_shenasname', 'tarikh_tavalod', 'mahale_sodur', 'cellphone', 'phone', 'adress', 'moqeiyate_makani'], 'required'],
            [['id_user', 'lng', 'lat', 'codemeli', 'shomare_shenasname', 'cellphone', 'telegram1', 'cellphone2', 'telegram2', 'phone_majmue', 'faks', 'phone_majmue2', 'faks2', 'phone', 'moqeiyate_tablo', 'kharid_az_sherkat', 'price', 'codemeli_persenel', 'faaliyat_tamvaqt', 'tavanaee_beruzresani_mahsulat', 'aya_berand', 'tavanee_ekhtiyargozashtan_mahsulat', 'lng2', 'lat2'], 'integer'],
            [['date'], 'safe'],
            [['eshterak', 'type', 'ostan', 'shahr', 'name', 'lastname', 'namepedar', 'tarikh_tavalod', 'mahale_sodur', 'email', 'adress', 'saat_az', 'saat_ta', 'ax_kartmeli_ro', 'ax_kartmeli_posht', 'ax_modir1', 'ax_modir2', 'sayer', 'tarefe', 'logo', 'namaye_dakheli1', 'namaye_dakheli2', 'namaye_khareji1', 'namaye_khareji2', 'saat_kari', 'name_hozeye_faaliyat', 'hamkari_ba_sherkat', 'ashnaee_kodam_service', 'moqeiyate_makani', 'ax_emza', 'date_farsi', 'mahale', 'dastebandi_shoqli'], 'string', 'max' => 300],
            [['sayer2', 'tavanaee_forosh_kodam_service', 'namayande_kodam_sherkat'], 'string', 'max' => 500],
            [['discription', 'name_persenel', 'lastname_persenel', 'name_pedar_persenel', 'shomareshenasname_persenel', 'tarikhe_tavalod_persenel', 'mahale_sodur_persenel', 'name_berand', 'logo_berand', 'moaref', 'ax_kartmeli_modir', 'ax_kartmeli_persenel', 'ax_tabloye_biruni'], 'string', 'max' => 600],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_user' => Yii::t('app', 'Id User'),
            'eshterak' => Yii::t('app', 'Eshterak'),
            'type' => Yii::t('app', 'Type'),
            'ostan' => Yii::t('app', 'Ostan'),
            'shahr' => Yii::t('app', 'Shahr'),
            'lng' => Yii::t('app', 'Lng'),
            'lat' => Yii::t('app', 'Lat'),
            'name' => Yii::t('app', 'Name'),
            'lastname' => Yii::t('app', 'Lastname'),
            'namepedar' => Yii::t('app', 'Namepedar'),
            'codemeli' => Yii::t('app', 'Codemeli'),
            'shomare_shenasname' => Yii::t('app', 'Shomare Shenasname'),
            'tarikh_tavalod' => Yii::t('app', 'Tarikh Tavalod'),
            'mahale_sodur' => Yii::t('app', 'Mahale Sodur'),
            'cellphone' => Yii::t('app', 'Cellphone'),
            'telegram1' => Yii::t('app', 'Telegram1'),
            'cellphone2' => Yii::t('app', 'Cellphone2'),
            'telegram2' => Yii::t('app', 'Telegram2'),
            'phone_majmue' => Yii::t('app', 'Phone Majmue'),
            'faks' => Yii::t('app', 'Faks'),
            'phone_majmue2' => Yii::t('app', 'Phone Majmue2'),
            'faks2' => Yii::t('app', 'Faks2'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'adress' => Yii::t('app', 'Adress'),
            'saat_az' => Yii::t('app', 'Saat Az'),
            'saat_ta' => Yii::t('app', 'Saat Ta'),
            'ax_kartmeli_ro' => Yii::t('app', 'Ax Kartmeli Ro'),
            'ax_kartmeli_posht' => Yii::t('app', 'Ax Kartmeli Posht'),
            'ax_modir1' => Yii::t('app', 'Ax Modir1'),
            'ax_modir2' => Yii::t('app', 'Ax Modir2'),
            'sayer' => Yii::t('app', 'Sayer'),
            'tarefe' => Yii::t('app', 'Tarefe'),
            'logo' => Yii::t('app', 'Logo'),
            'namaye_dakheli1' => Yii::t('app', 'Namaye Dakheli1'),
            'namaye_dakheli2' => Yii::t('app', 'Namaye Dakheli2'),
            'namaye_khareji1' => Yii::t('app', 'Namaye Khareji1'),
            'namaye_khareji2' => Yii::t('app', 'Namaye Khareji2'),
            'saat_kari' => Yii::t('app', 'Saat Kari'),
            'sayer2' => Yii::t('app', 'Sayer2'),
            'name_hozeye_faaliyat' => Yii::t('app', 'Name Hozeye Faaliyat'),
            'hamkari_ba_sherkat' => Yii::t('app', 'Hamkari Ba Sherkat'),
            'ashnaee_kodam_service' => Yii::t('app', 'Ashnaee Kodam Service'),
            'moqeiyate_makani' => Yii::t('app', 'Moqeiyate Makani'),
            'moqeiyate_tablo' => Yii::t('app', 'Moqeiyate Tablo'),
            'ax_emza' => Yii::t('app', 'Ax Emza'),
            'kharid_az_sherkat' => Yii::t('app', 'Kharid Az Sherkat'),
            'tavanaee_forosh_kodam_service' => Yii::t('app', 'Tavanaee Forosh Kodam Service'),
            'price' => Yii::t('app', 'Price'),
            'date_farsi' => Yii::t('app', 'Date Farsi'),
            'date' => Yii::t('app', 'Date'),
            'mahale' => Yii::t('app', 'Mahale'),
            'dastebandi_shoqli' => Yii::t('app', 'Dastebandi Shoqli'),
            'namayande_kodam_sherkat' => Yii::t('app', 'Namayande Kodam Sherkat'),
            'discription' => Yii::t('app', 'Discription'),
            'name_persenel' => Yii::t('app', 'Name Persenel'),
            'lastname_persenel' => Yii::t('app', 'Lastname Persenel'),
            'name_pedar_persenel' => Yii::t('app', 'Name Pedar Persenel'),
            'codemeli_persenel' => Yii::t('app', 'Codemeli Persenel'),
            'shomareshenasname_persenel' => Yii::t('app', 'Shomareshenasname Persenel'),
            'tarikhe_tavalod_persenel' => Yii::t('app', 'Tarikhe Tavalod Persenel'),
            'mahale_sodur_persenel' => Yii::t('app', 'Mahale Sodur Persenel'),
            'faaliyat_tamvaqt' => Yii::t('app', 'Faaliyat Tamvaqt'),
            'tavanaee_beruzresani_mahsulat' => Yii::t('app', 'Tavanaee Beruzresani Mahsulat'),
            'aya_berand' => Yii::t('app', 'Aya Berand'),
            'name_berand' => Yii::t('app', 'Name Berand'),
            'logo_berand' => Yii::t('app', 'Logo Berand'),
            'tavanee_ekhtiyargozashtan_mahsulat' => Yii::t('app', 'Tavanee Ekhtiyargozashtan Mahsulat'),
            'moaref' => Yii::t('app', 'Moaref'),
            'ax_kartmeli_modir' => Yii::t('app', 'Ax Kartmeli Modir'),
            'ax_kartmeli_persenel' => Yii::t('app', 'Ax Kartmeli Persenel'),
            'ax_tabloye_biruni' => Yii::t('app', 'Ax Tabloye Biruni'),
            'lng2' => Yii::t('app', 'Lng2'),
            'lat2' => Yii::t('app', 'Lat2'),
        ];
    }

    /**
     * @inheritdoc
     * @return HozeFaaliyatQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HozeFaaliyatQuery(get_called_class());
    }
}
