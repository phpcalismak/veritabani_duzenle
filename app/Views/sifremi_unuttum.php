<!-- forgot_password.php -->

<form method="post" action="<?= site_url('sifremi_unuttum'); ?>">
    <div class="mb-3">
        <label for="InputForEmail" class="form-label">Email Adresi</label>
        <input type="email" name="email" class="form-control" id="InputForEmail">
    </div>
    <button type="submit" class="btn btn-primary">Şifre Sıfırlama Linki Gönder</button>
</form>
