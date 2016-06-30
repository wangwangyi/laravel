<?php

function listDir($dir)
{
    $result = [];
    if(is_dir($dir))
    {
        if ($dh = opendir($dir))
        {
            while (($file = readdir($dh)) !== false)
            {
                $array = [];
                if((is_dir($dir."/".$file)) && $file!="." && $file!="..")
                {
                    $array["name"] = $file;
                    $array['children'] = listDir($dir."/".$file."/");
                    $result[] = $array;
                }
            }
            return $result;
            closedir($dh);
        }
    }
}
//截取
function subtext($text, $length)
{
    if(mb_strlen($text, 'utf8') > $length)
        return mb_substr($text, 0, $length, 'utf8').'...';
    return $text;
}


//是否...
function is_something($attr, $module)
{
    return $module->$attr ? '<span class="am-icon-check is_something" data-attr="' . $attr . '"></span>' : '<span class="am-icon-close is_something" data-attr="' . $attr . '"></span>';
}

