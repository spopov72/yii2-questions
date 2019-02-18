<?php
 
namespace app\components;
 
use Yii;
use yii\base\Component;
//use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
 
class Configstr extends Component {
 
    private $_attributes;
 

    public function init() {
        parent::init();
        $this->_attributes = ArrayHelper::map(\app\models\configstr::find()->all(), 'name', 'val');
    }
 
    public function __get($name) {
        if (array_key_exists($name, $this->_attributes))
        {//
            $val=$this->_attributes[$name];
            $val=html_entity_decode(($val),ENT_QUOTES);
            $val= str_replace("\n", "", $val);
            $val= str_replace(chr(13), "", $val);
            return strip_tags($val);
        }
        return parent::__get($name);
    }
    
    public function gethtml($name) {
    	$val="";
        if (array_key_exists($name, $this->_attributes))
        {//
            $val=$this->_attributes[$name];
            $val=html_entity_decode(($val),ENT_QUOTES);
            return $val;
        }
        return $val;
    }
    
    
    public function get_friend_title_asis($id){

}