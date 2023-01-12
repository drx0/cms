<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?=v('page/meta_description')?>">
        <title><?=v('page/meta_title')?> — <?=v('settings/title')?></title>
        <link rel="icon" href="<?=asset('images/favicon.png')?>" type="image/x-icon">
        <link type="text/css" rel="stylesheet" href="<?=asset('css/backend.css')?>">
        <?php if(isset($page['model']['ckeditor'])){?>
        <link type="text/css" rel="stylesheet" href="{{'assets/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css'|theme}}">
        <?php }?>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="wrapper">
            <div class="content">
                <?php require partial('header');?>
                <?php require view();?>
            </div>
            <?php require partial('footer');?>
        </div>

        <div class="e60 none" id="blockClick"></div>

        <?php if(isset($page['model']['ckeditor'])){?>
        <script src="<?=asset('plugins/ckeditor/ckeditor.js')?>"></script>
        <script>
        CKEDITOR.config.height = 320;
        CKEDITOR.config.width = '100%';
        var initSample = (function(){
            var wysiwygareaAvailable = isWysiwygareaAvailable(),
                isBBCodeBuiltIn = !!CKEDITOR.plugins.get('bbcode');
            return function(){
                var editorElement = [];
                <?php foreach($page['model']['ckeditor'] as $name){?>
                editorElement.push(CKEDITOR.document.getById('<?=$name?>'));
                <?php }?>
                if(wysiwygareaAvailable){
                    <?php foreach($page['model']['ckeditor'] as $name){?>CKEDITOR.replace('<?=$name?>');<?php }?>
                }else{
                    for(i=0;i<editorElement.length;i++){
                        editorElement[i].setAttribute('contenteditable', 'true');
                    }
                    <?php foreach($page['model']['ckeditor'] as $name){?>CKEDITOR.inline('<?=$name?>');<?php }?>
                }
            };
            function isWysiwygareaAvailable(){
                if(CKEDITOR.revision == ('%RE' + 'V%')){
                    return true;
                }
                return !!CKEDITOR.plugins.get('wysiwygarea');
            }
        })();
        initSample();
        </script>
        <?php }?>

        <script src="<?=asset('js/backend.js')?>"></script>
    </body>
</html>