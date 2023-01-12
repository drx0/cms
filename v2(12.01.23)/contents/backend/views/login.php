<div class="e4">
    <form class="Request" data-callback="callback_login">
        <input class="hide" type="text" name="method" value="backend/login">
        <label class="e6 e7">
            <p>Логин <span>*</span></p>
            <div><input type="text" name="login" required></div>
        </label>
        <label class="e6 e7">
            <p>Пароль <span>*</span></p>
            <div><input type="password" name="password" required></div>
        </label>
        <div class="e6 e7">
            <p></p>
            <div>
                <label class="custom-checkbox">
                    <input type="checkbox" name="remember">
                    <span>Запомнить меня</span>
                </label>
                <div class="e8"><button type="submit" class="btn">Войти</button></div>
                <ul class="e9">
                    <li><a href="/<?=$backend_slug?>/recovery/password" class="a">Забыли пароль?</a></li>
                    <li><a href="/<?=$backend_slug?>/recovery/login" class="a">Забыли логин?</a></li>
                </ul>
            </div>
        </div>
    </form>
</div>