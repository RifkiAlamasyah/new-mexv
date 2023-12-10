<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<h1>Login</h1>

<?php if (isset($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?= $error; ?>
    </div>
<?php endif; ?>

<?= form_open('/login'); ?>
<label for="username">Username:</label>
<input type="text" name="username" required>

<label for="password">Password:</label>
<input type="password" name="password" required>

<button type="submit">Login</button>
<?= form_close(); ?>

<?= $this->endSection() ?>