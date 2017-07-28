<?php
function passwordTest($str)
{
    $score = 0;
    if(preg_match("/[0-9]+/",$str))
    {
        $score ++;
    }
    if(preg_match("/[0-9]{3,}/",$str))
    {
        $score ++;
    }
    if(preg_match("/[a-z]+/",$str))
    {
        $score ++;
    }
    if(preg_match("/[a-z]{3,}/",$str))
    {
        $score ++;
    }
    if(preg_match("/[A-Z]+/",$str))
    {
        $score ++;
    }
    if(preg_match("/[A-Z]{3,}/",$str))
    {
        $score ++;
    }
    if(preg_match("/[_|\-|+|=|*|!|@|#|$|%|^|&|(|)]+/",$str))
    {
        $score += 2;
    }
    if(preg_match("/[_|\-|+|=|*|!|@|#|$|%|^|&|(|)]{3,}/",$str))
    {
        $score ++ ;
    }
    if(strlen($str) >= 10)
    {
        $score ++;
    }

    if ($score>=5)
    {return true;}
    else
    {return false;}
}

?>