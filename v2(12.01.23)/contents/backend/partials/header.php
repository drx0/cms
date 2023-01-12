<div class="e1">
    <div>
        <a href="/<?=$backend_slug?>" class="e2"><img src="<?=asset('images/favicon.png')?>"></a>
        <nav>
            <ul class="e3">
            <?php
            foreach($menu as $parent=>$item){
                if($item['type'] == 'ul'){?>
                <li>
                    <a<?=$item['active']?> href="#"><?=$menu_parents[$parent]?></a>
                    <ul>
                        {% for item in item.items %}
                        <li><a<?=$item['active']?> href="/<?=$backend_slug?>/<?=$item['url']?>"><?=$item['title']?></a></li>
                        {% endfor %}
                    </ul>
                </li>
            <?php }else{?>
                <li><a<?=$item['active']?> href="/<?=$backend_slug?>/<?=$item['url']?>"><?=$item['title']?></a></li>
            <?php }}?>
            </ul>
        </nav>
    </div>
</div>