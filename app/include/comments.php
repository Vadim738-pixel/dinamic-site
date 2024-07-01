<?php

include ROOT_PATH . '/app/controllers/commentaries.php';



?>

<div class="col-md-12 col-12 comments">

    <h3>Залишити коментарій</h3>


    <form action="<?= BASE_URL . "single.php?post=$page "?>"  method="post">

        <input type="hidden" name="page" value="<?=$page?>"  >

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email адреса</label>
            <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label  for="exampleFormControlTextarea1" class="form-label">Надішліть ваш відгук</label>
            <textarea name="comment"  class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="col-12">

            <button type="submit" name="goComment" class="btn btn-primary">Надіслати</button>

        </div>

    </form>

    <?php if(count($comments) > 0): ?>
<div class="row all-comments">
    <h3 class="col-12">Комментарі до запису (-та до записів в цілому)</h3>
    <?php foreach ($comments as $comment): ?>
    <div class="one comment col-12">
        <span><?=@$comment['email']?></span>
        <span><?=@$comment['created_date'] ?></span>
        <div class="col-12 text">
            <?=@$comment['comment']?>
        </div>
    </div>

    <?php endforeach ?>

</div>

    <?php endif; ?>

</div>
