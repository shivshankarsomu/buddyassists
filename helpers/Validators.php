<?
namespace buddy\helpers;
class Validators
{

    public static function null_check($obj){
        foreach ($obj as $key => $value) {
            if(!isset($value) || strlen($value) == 0)
            return false;
        }
        return true;
	}

}
?>
