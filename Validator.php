<?php

class Validator
{

    public static function Email(string $email)
    {
        $string = trim($email);

        if(!filter_var($string, FILTER_VALIDATE_EMAIL))
        {
            return false;
        }

        return true;
    }

    public static function Password(string $password, $min = 0, $max = INF)
    {
        $string = trim($password);

        if(!is_string($string))
        {
            return false;
        }

        if(strlen($string) < $min)
        {
            return false;
        }

        if(strlen($string) >= $max)
        {
            return false;
        }

        if ( !preg_match("#[0-9]+#", $string) )
        {
            return false;
        }
    
        if ( !preg_match("#[a-z]+#", $string) )
        {
            return false;
        }
    
        if ( !preg_match("#[A-Z]+#", $string) )
        {
            return false;
        }
    
        if ( !preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $string) ) //spec characters
        {
            return false;
        }

        return true;
    }

    public static function String(string $string, $min = 0, $max = INF)
    {
        $string = trim($string);

        if(!is_string($string))
        {
            return false;
        }

        if(strlen($string) < $min)
        {
            return false;
        }

        if(strlen($string) >= $max)
        {
            return false;
        }

        return true;
    }

    public static function Date($date, $format = 'Y-m-d')
    { 
        $input_date = DateTime::createFromFormat($format, $date);
        $current_date = new DateTime();
        if(!DateTime::createFromFormat($format, $date))
        {
            return false;
        }

        if($input_date > $current_date)
        {
            return false;
        }


        return true; 
    }

    public static function Gender(string $gender)
    {
        $string = trim($gender);
        $string = strtolower($string);

        if($string == "male" || $string == "female")
        {
            return false;
        }

        return true;
    }

    public static function Number($number, $min = 0, $max = INF)
    {

        if(!is_numeric($number))
        {
            return false;
        }

        if($number <= $min)
        {
            return false;
        }

        if($number >= $max)
        {
            return false;
        }

        return true;
    }

}