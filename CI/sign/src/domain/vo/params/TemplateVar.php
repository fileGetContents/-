<?php
namespace BestSignSDK;

class TemplateVar
{
    public static function buildData($name, $type, $page, $x, $y, $width = 0, $height = 0)
    {
        $result = array();
        $params = Utils::getMethodParams(__CLASS__, __FUNCTION__);
        foreach ($params as $build_data_param_name)
        {
			$result[$build_data_param_name] = $$build_data_param_name . "";
        }
        return $result;
    }
}