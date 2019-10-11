<?php include_once 'conditionsform.php' ?>

<div class="container">
    <form method="post" action="">
            <label for="title">
                Name
            </label>
            <input class="form-control <?= $nameError === '' ? '' : 'is-invalid'?>" type="text" id="name" value="<?= $name ?>">
            <div class="invalid-feedback">
                <?= $nameError ?>
            </div>

            <label for="payment">
                Payment
            </label>
            <input class="form-control <?= $paymentError === '' ? '' : 'is-invalid'?>" type="number" name="payment" id="payment" value="<?= $payment ?>">
            <div class="invalid-feedback">
                <?= $paymentError ?>
            </div>
        <button type="submit" class="btn btn-primary">Register the bribe</button>
    </form>
</div>