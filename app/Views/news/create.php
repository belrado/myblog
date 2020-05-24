<h2><?=esc($title)?></h2>

<?=\Config\Services::validation()->listErrors()?>

<form action="/news/create" method="post">
    <?=csrf_field()?>

    <div>
        <label for="title">Title</label>
        <input type="input" name="title">
    </div>

    <div>
        <label for="body">Text</label>
        <textarea name="body" cols="30" rows="10"></textarea>
    </div>

    <input type="submit" value="Create news item">

</form>