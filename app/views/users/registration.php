<h2>Форма регистрации</h2>
<form action="index.php?c=users&a=registration" method="post" class="forms">
    <div class="field">
        <div class="beforeInput">Введите Email:</div><input type="text" name="email">
    </div> 
    <div class="field"> 
        <div class="beforeInput">Введите пароль:</div><input type="password" name="password">
    </div>
    <div class="field">
        <div class="beforeInput">Подтверждение:</div><input type="password" name="repassword">
    </div>
    <div class="field">
        <input type="submit" name="go" value="Зарегистрироваться">
    </div>
<?php
if($error != ''){
echo "
<div class=\"error\">
{$error}
</div>
";
}
?>

</form>