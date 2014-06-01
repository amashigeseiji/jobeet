<?php
class Jobeet
{
  static public function slugify($text)
  {
    // 文字ではないもしくは数値ではないものすべてを - に置き換える
    $text = preg_replace('#[^\\pL\d]+#u', '-', $text);

    //トリム
    $text = trim($text, '-');

    //翻字する
    if (function_exists('iconv'))
    {
      $text = iconv('utf8', 'us-ascii//TRANSLIT', $text);
    }

    //小文字に変換
    $text = strtolower($text);

    //望まない文字を取り除く
    $text = preg_replace('#[^-\w]+#', '', $text);

    if (empty($text))
    {
      $text = 'n-a';
    }

    return $text;
  }
}
