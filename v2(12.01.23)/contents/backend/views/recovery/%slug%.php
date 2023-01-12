<div class="e10">
    <div class="e11"><p>Пожалуйста, введите адрес электронной почты, указанный в параметрах вашей учётной записи. На него будет отправлен <?php if($slug[1] == 'password'){?>специальный проверочный код. После его получения вы сможете ввести новый пароль для вашей учётной записи.<?php }elseif($slug[1] == 'login'){?>ваш логин.<?php }?></p></div>
    <form class="Request" data-callback="callback_recovery_send">
        <input class="hide" type="text" name="method_type" value="backend/recovery-send" />
        <input class="hide" type="text" name="act" value="<?=$slug[1]?>" />
        <label class="e6 e7">
            <p>Адрес электронной почты <span>*</span></p>
            <div><input type="text" name="email" required /></div>
        </label>
        <div class="e6 e7">
            <p></p>
            <div>
                <div class="e8"><button type="submit" class="btn">Отправить</button></div>
            </div>
        </div>
    </form>
</div>