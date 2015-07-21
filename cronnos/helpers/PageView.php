<?php
namespace cronnos\helpers;

/**
 * Page view related helper
 * Use in frameworks which have ORM functions
 */
class PageView
{
    /**
     * Judge whether there has to add views into table or not.
     * @param  string  $model  model's name
     * @param  integer $id     model's id
     * @param  string  $action ORM's find-data-by-id function name,
     *                         default is Laravel's find() function
     * @param  int     $expire cookie's expire time, default are 3600 seconds
     * @return bool    $res    (true|false)
     */
    public static function canAdd($model = '', $id = 0, $action = 'find', $expire = 3600)
    {
        try {
            $target = $model::$action($id);
            if ( empty($target) )
                throw new \Exception("query not found!", 400);
            $res = false;
            $cookieName = $model . $id;
            $cookieVal = md5("$model-$id-" . date("Y-m-d H"));
            if ( !isset($_COOKIE[$cookieName]) ) {
                setcookie($cookieName, $cookieVal, time() + $expire);
                $res = true;
            } elseif ( $_COOKIE[$cookieName] != $cookieVal ) {
                $res = true;
            }
            return $res;
        } catch (\Exception $e) {
            return false;
        }
    }
}
