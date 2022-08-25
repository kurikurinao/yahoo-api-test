<?php
/** @mainpage
 *  カテゴリランキングを表示
 */

/**
 * @file
 * @brief カテゴリランキング表示
 *
 * カテゴリランキングAPIを利用し、
 * 変数$category_idに指定されたカテゴリのランキングを問い合わせます。
 * その結果をhtmlに埋め込んで表示します。
 *
 * PHP version 5
 */
require_once("./common.php");//共通ファイル読み込み(使用する前に、appidを指定してください。)

// $hits = array();
$category_id = "2495";//検索したいカテゴリーIDを入れてください。

$url = "https://shopping.yahooapis.jp/ShoppingWebService/V2/categoryRanking?appid=$appid&category_id=$category_id";


// 必要に応じてオプションを追加してください。
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST,  'GET');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);
?>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
        <title>ショッピングデモサイト - カテゴリ別売り上げランキングを表示する - catoery_id 「<?php echo h($category_id); ?>」のランキング</title>
        <link rel="stylesheet" type="text/css" href="../../css/prototype.css"/>
    </head>
    <body>
        <h1><a href="./index.php">ショッピングデモサイト - カテゴリ別売り上げランキングを表示する - catoery_id 「<?php echo h($category_id); ?>」のランキング</a></h1>
        <?php foreach ($response as $ranking) { ?>
        <div class="Item">
            <h2><a href="<?php echo h($ranking->Url); ?>"><?php echo h($ranking->Name); ?></a></h2>
            <p><a href="<?php echo h($ranking->Url); ?>"><img src="<?php echo h($ranking->Image->Medium); ?>" /></a><?php echo h($ranking->Description); ?></p>
        </div>
        <?php } ?>
    </body>
<!-- Begin Yahoo! JAPAN Web Services Attribution Snippet -->
<a href="http://developer.yahoo.co.jp/about">
<img src="http://i.yimg.jp/images/yjdn/yjdn_attbtn2_105_17.gif" width="105" height="17" title="Webサービス by Yahoo! JAPAN" alt="Webサービス by Yahoo! JAPAN" border="0" style="margin:15px 15px 15px 15px"></a>
<!-- End Yahoo! JAPAN Web Services Attribution Snippet -->
</html>
