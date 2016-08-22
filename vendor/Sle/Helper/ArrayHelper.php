<?php

namespace Sle\Helper;

/**
 * ArrayHelper
 *
 * @author Steve Lenz <kontakt@steve-lanz.de>
 * @copyright (c) 2014, Steve Lenz
 * @version 1.2.0
 */
class ArrayHelper
{
    /**
     *
     * @var array
     */
    private $array = null;

    /**
     * Set array
     *
     * @param array $array
     * @return \xima\Helpers\ArrayHelper
     */
    public function setArray(array $array)
    {
        $this->array = $array;

        return $this;
    }

    /**
     * Get value by key
     *
     * @param string $key
     * @param mixed $default Default value if key doesn't exist in array
     * @return mixed
     */
    public function getValueByKey($key, $default = false)
    {
        return (isset($this->array[$key])) ? $this->array[$key] : $default;
    }

    /**
     * Returns the value of a specific key
     *
     * @param string $path Path separeted by ":", e.g. Key:Key2:Key2
     * @return mixed
     */
    public function getValueByPath($path)
    {
        $paths = explode(':', $path);

        $array = $this->array;
        foreach ($paths as $index) {
            if (isset($array[$index])) {
                $array = $array[$index];
            } else {
                return false;
            }
        }

        return $array;
    }

    /**
     * Checks whether value in array exists
     *
     * @param string $value
     * @return type
     */
    public function inArray($value)
    {
        return (in_array($value, $this->array)) ? true : false;
    }

    /**
     * Transforms an array to an stdObject
     *
     * @param array $array
     * @return \stdClass
     */
    public function array2Object(array $array)
    {
        $object = new \stdClass();

        foreach ($array as $key => $val) {
            $object->{$key} = $val;
        }

        return $object;
    }

    /**
     * Transforms an array and its subarrays to an stdObject
     *
     * @param array $array
     * @return \stdClass
     */
    public function arrayAndSubArrays2Object(array $array)
    {
        $object = new \stdClass();

        foreach ($array as $key => $val) {
            if (!empty($key)) {
                if (is_array($val)) {
                    $object->{$key} = $this->arrayAndSubArrays2Object((array)$val);
                } else {
                    $object->{$key} = $val;
                }
            }
        }

        return $object;
    }

}
