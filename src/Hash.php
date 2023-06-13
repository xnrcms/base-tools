<?php

namespace Xnrcms\BaseTools;

use ErrorException;

/**
 * 密码加密助手
 * Class Hash
 * @package Xnrcms\BaseHelper
 */
class Hash
{
    protected static $handle = [];

    /**
     *
     * @param $value
     * @param $type
     * @param array $options
     * @return mixed
     * @throws ErrorException
     */
    public static function make($value, $type = null, array $options = [])
    {
        return self::handle($type)->make($value, $options);
    }

    /**
     *
     * @param $value
     * @param $hashedValue
     * @param $type
     * @param array $options
     * @return mixed
     * @throws ErrorException
     */
    public static function check($value, $hashedValue, $type = null, array $options = [])
    {
        return self::handle($type)->check($value, $hashedValue, $options);
    }

    /**
     *
     * @param $type
     * @return mixed
     * @throws ErrorException
     */
    public static function handle($type)
    {
        if (is_null($type)) {
            if (PHP_VERSION_ID >= 50500) {
                $type = 'bcrypt';
            } else {
                $type = 'md5';
            }
        }

        if (empty(self::$handle[$type])) {
            $class = "\\Xnrcms\\BaseHelper\\hash\\" . ucfirst($type);
            if (!class_exists($class)) {
                throw new ErrorException("Not found {$type} hash type!");
            }
            self::$handle[$type] = new $class();
        }

        return self::$handle[$type];
    }

}
