<?php
class Input
{
    public static function getString($key, $min = 1, $max = 400)
    {
        $string = Input::get($key);
        if(empty($string)){
            throw new OutOfRangeException("{$key} does not have a value.");
        }else if(!is_numeric($key) && is_numeric($min) && is_numeric($max)){
            if(!is_numeric($string)){
                if(strlen($string) > $min && strlen($string) < $max){
                    return $string;
                }else{
                    throw new LengthException("The number of characters in ({$string}) must be greater than {$min} and less than {$max}.");
                }
            }else{
                throw new DomainException("{$string} needs to be a string.");
            }
        }else{
            throw new InvalidArgumentException("{$key} needs to be a string, and {$min} and {$max} should be numeric.");
        }
        
    }

    public static function getDate($key)
    {
        $value = Input::get($key);
        $format = 'Y-m-d';
        $dateObject = DateTime::createFromFormat($format, $value);
        if($dateObject) {
            $dateString = $dateObject->format($format);
            return $dateString;
        } else {
            throw new Exception($value . ' is not a valid date.');
        }
    }
    public static function getNumber($key, $min = 1, $max = 9999999999.99 )
    {
        $number = Input::get($key);
        if(empty($number)){
            throw new OutOfRangeException("{$key} does not have a value.");
        }else if(!is_numeric($key) && is_numeric($min) && is_numeric($max)){
            if(is_numeric($number)){
                if($number > $min && $number < $max){
                    return $number;
                }else{
                    throw new RangeException("The number ({$number}) must be greater than {$min} and less than {$max}.");
                }
            }else{
                throw new DomainException("{$number} needs to be a number.");
            }
        }else{
            throw new InvalidArgumentException("{$key} needs to be a string, and {$min} and {$max} should be numeric.");
        }
        
    }
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
       if (isset($_REQUEST[$key])){
        return true;
       }else{
        return false;
       }
    }
    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        if (isset($_REQUEST[$key])){
            return trim($_REQUEST[$key]);
        }
        else{
            return $default;
        }
    }
    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}