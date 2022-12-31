<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?=v('page/meta_description')?>">
		<title><?=v('page/meta_title')?> — <?=v('settings/title')?></title>
		<link rel="icon" type="image/x-icon" href="<?=asset('images/favicon.ico')?>">
    </head>
	<body>
        <main>
            <div class="content">
                <?php view();?>
            </div>
            <footer>
                <p>&copy; Copyright 2022 (<?=$settings['title']?>)</p>
            </footer>
        </main>
	</body>
</html>