 <?php foreach ($newsList as $news): ?>
    <div class="news">
        <h3><a href="<?= route('showNews', ['id' => $news['id'], 'category_id' =>$news['category_id'] ])?>"><?=$news['title']?></a></h3>
        <img src="<?=$news['image'] ?>" alt="photo">
        <br>
        <p>Статус:<em><?=$news['status']?></em>  Автор: <em><?=$news['author']?></em></p>
        <p><?=$news['description']?></p>
        <p><?=$news['category_id']?></p>
    </div>
    <hr>
 <?php endforeach; ?>

