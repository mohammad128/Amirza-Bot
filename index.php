<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Amirza Bot</title>
</head>
<body>

<?php
ini_set('memory_limit', '440M');

require_once __DIR__.'/Bot.php';
require_once __DIR__ . '/Words.php';
require_once __DIR__ . '/Word.php';

if (isset($_POST['chars'])) {
    $chars = explode(' ', $_POST['chars']);
    $bot = new Bot();
    $words = new Words();
    $f_name = 'big.txt';
    if (isset($_POST['f_name']) and !empty($_POST['f_name']))
        $f_name = $_POST['f_name'];
    $words->load(__DIR__ . "/{$f_name}");
    $bot->setWords($words);
    $bot->setChars($chars);

    $foundedWords = $bot->check($chars);
//    var_dump($result);

    $res = [];
    foreach ($foundedWords as $item) {
        $len = mb_strlen($item->getWord());
        if ( !isset($res[$len]) )
            $res[$len] = [];
        array_push( $res[$len], $item);
//        echo $len . ':' . $item->getWord() . '<BR/>';
    }
    ?>
    <h1 class="text-center text-3xl font-bold py-4 maxw"><?= count($foundedWords) ?> Result</h1>
    <div class="gap-8 columns-3 min-h-screen min-w-screen" >
    <?php
    foreach ($res as $key=>$items) {
        echo '<div class=" bg-green-200 w-full text-justify px-6 mb-4">';
        echo "<h2 class='font-bold'>{$key} Charapter:<h2/>";
        ?>
            <ul class="list-disc">
                <?php
                foreach ($items as $item) {
                    ?>
                    <li><?= $item ?></li>
                    <?php
                }
                ?>
            </ul>
            <br/>
        <?php
        echo '</div>';
    }
    ?>
    </div>
    <?php
}
else {
    ?>
    <div class="h-screen w-screen bg-gray-900 flex flex-row justify-center items-center">
        <form method="post" class="max-w-lg min-h-[220px] flex flex-col justify-between bg-white rounded-lg p-4" >
            <span>حروف را با اسپیس (فاصله) از هم جدا کنید</span>
            <input type="text" name="chars" id="" placeholder="ا ب س ث" class="px-4 bg-gray-900 rounded-lg leading-10 text-white">
            <select name="f_name" id="" class="px-4 h-10 bg-gray-900 rounded-lg leading-10 text-white" >
                <option value="big.txt">big.txt</option>
                <option value="small.txt">small.txt</option>
            </select>
            <input type="submit" value="Start" class="bg-sky-500 font-bold p-2 rounded-lg hover:bg-sky-300 cursor-pointer">
        </form>
    </div>
    <?php
    }
?>
</body>
</html>