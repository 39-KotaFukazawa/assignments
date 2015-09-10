<?php 
//正規表現
if (preg_match('/^[1-9][0-9]*$/', $_GET["page"])) {
    $page =$_GET["page"];
}else{
    $page=1;
}
//select * from news limit offset,count
//page offset count
//1    0       5
//2    5       5
// define(COMMENTS_PER_PAGE, 5);
//ページング機能実装
$count=0;
$comments_per_page = 5;
$offset = $comments_per_page *($page-1);
//情報をget
$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8","root","");

$sql = "SELECT * FROM news LIMIT ".$offset.",".$comments_per_page;


$stmt=$pdo->prepare($sql);

$stmt ->execute();

$result = $stmt->fetchALL(PDO::FETCH_ASSOC);

$total = $pdo->query("select count(*) from news")->fetchColumn();
$totalPages = ceil($total/$comments_per_page);

$from = $offset + 1;
$to = ($offset + $comments_per_page) < $total ? ($offset + $comments_per_page) : $total;

$pdo = null;
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
   
</head>
<body>
     <?php include("header.php"); ?>
    
    <section class="news contents-box">
        <h2 class="section-title text-center">
            <span class="section-title__yellow">News</span>
            <span class="section-title-ja text-center"><ul><?php foreach ($result as $row) 
                {
                echo "<li>{$row["create_date"]}</li>";
                } ?></span></ul>
        </h2>
        <article class="news-detail">
            <dl class="clearfix">
                <dd class="news-title"><?php foreach ($result as $row) 
                {$news_id=$row["news_id"];
                $news_title = $row["news_title"];
                $news_detail = $row["news_detail"];
                $news_length = mb_strlen($news_detail);
                $news_short = mb_substr($news_detail, 0,10);
                $create_date = $row["create_date"];
                echo "<dt><a href='news_list.php?news_id=$news_id&title=$news_title&detail=$news_detail&date=$create_date'>{$news_title}</a></dt>";
                if ($news_length<=10) {
                    echo "<dd>{$news_detail}</dd>";
                }else{
                    echo "<dd>{$news_short}...</dd>";
                }
                
                } ?></dd>
            </dl>
            <p>全<?php echo $total; ?>件中、<?php echo $from ;?>件から<?php echo $to; ?>を表示しています</p>
            <?php if ($page>1):?>
            <a href="news.php?page=<?php echo $page-1 ?>">前</a>
            <?php endif; ?>
        <?php for ($i=0; $i<=$totalPages;$i++) : ?>
        <?php if ($page ==$i) : ?>
        <strong><a href="news.php?page=<?php echo $i; ?>"><?php echo $i; ?>></a></strong>
    <?php else : ?>
    <a href="news.php?page=<?php echo $i; ?>"><?php echo $i; ?>></a>
<?php endif; ?>
        <?php endfor; ?>
            <?php if ($page<$totalPages ):?>
            <a href="news.php?page=<?php echo $page+1 ?>">次へ</a>
            <?php endif; ?>
        </article>
    </section>

    <!--#information-->
     <?php include("footer.php"); ?>
</body>
</html>