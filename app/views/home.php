<?php
require_once __DIR__ . '/./includes/header.php';
debug($viewData, 0);
debug($_SESSION, 0);
?>
<main>
    <h1>home</h1>
    <form action="#" method="post">
        <label for="firstnameRegister">firstname</label>
        <input type="text" id="firstnameRegister" name="firstnameRegister">

        <label for="lastnameRegister">lastname</label>
        <input type="text" id="lastnameRegister" name="lastnameRegister">

        <label for="mailRegister">mail</label>
        <input type="text" id="mailRegister" name="mailRegister">

        <label for="passwordRegister">password</label>
        <input type="password" id="passwordRegister" name="passwordRegister">

        <input type="hidden" value="<?= $csrf ?>" name="csrf">
        <button type="submit">Send</button>
    </form>
</main>
<?php
require_once __DIR__ . '/./includes/footer.php';
