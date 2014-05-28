<?php
class Jobeet
{
  static public function slugfy($text)
  {
    // 文字ではないもしくは数値ではないものすべてを - に置き換える
    $text = preg_replace('/\W+/', '-', $text);
    //トリムして小文字に変換
    $text = strtolower(trim($text, '-'));

    return $text;
  }
}
