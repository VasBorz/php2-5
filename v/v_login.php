<h1><?= $title ?></h1>
<h3><?= $text ?></h3>
<form method="post" action="index.php?c=user&act=reg" style="display: grid; grid-template-columns: 250px; grid-template-rows: repeat(3,1fr); grid-gap: 20px;'">
    <input type="text" name="user_name" placeholder="Your login">
    <input type="password" name="pwd" placeholder="Your password">
    <input type="submit" value="Login"/>
</form>