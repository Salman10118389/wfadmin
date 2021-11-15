<?php
/**
 * Created by IntelliJ IDEA.
 * User: daoez19
 * Date: 8/23/17
 * Time: 9:53 AM
 */
if(!function_exists('dateFormat'))
{
    function dateFormat($format='d-m-YYYY', $givenDate=null)
    {
        return date($format, strtotime($givenDate));
    }

}