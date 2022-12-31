<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?=v('page/meta_description')?>">
		<title><?=v('page/meta_title')?> — <?=v('settings/title')?></title>
		<link rel="icon" type="image/x-icon" href="<?=asset('images/favicon.ico')?>">
        <link rel="stylesheet" type="text/css" href="<?=asset('css/backend.css')?>">
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
        <script src="<?=asset('js/backend.js')?>"></script>
	</body>
</html>