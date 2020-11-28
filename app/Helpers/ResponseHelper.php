<?php namespace App\Helpers;

class ResponseHelper{

    /**
     * Return error from resources/lang/en/error
     *
     * @param $code
     * @param string $default
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
   public static function error($code, $default='')
   {
       $error = trans("response.$code");
       return $error ? $error : $default;
   }

    /**
     * Return error from resources/lang/en/error
     *
     * @param $code
     * @param string $default
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    public static function message($code, $default='')
    {
        $error = trans("response.$code");

        if( is_array($error) && isset($error['message']) ){
            return $error['message'];
        }

        return $default;
    }


    /**
     * Return error from resources/lang/en/error
     *
     * @param $code
     * @param string $default
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    public static function status($code, $default='')
    {
        $error = trans("response.$code");

        if( is_array($error) && isset($error['status']) ){
            return $error['status'];
        }

        return $default;
    }

    /**
     * Return error from resources/lang/en/error
     *
     * @param $status
     * @param string $type
     * @param string $default
     * @return string
     */
    public static function withStatus($status, $type='message', $default='')
    {

//        collect(trans('error'))->where('status', $status)


        return $default;
    }
}
