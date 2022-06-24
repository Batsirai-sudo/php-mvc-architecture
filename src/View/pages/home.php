
<?php $label = "cfgvhbjnjkmk" ?>

<div class="container">
    <h1>String Sort </h1>
    <?php include VIEW_PATH.'components/molecules/form.php'; ?>
    <?php if(isset($errors)){ ?>
        <?php foreach($errors as $error){ ?>

            <?php foreach($error as $value){ ?>
                <div class="text-center my-2 text-danger text-sm">
                    <?php echo $value; ?>
                </div>
            <?php } ?>

        <?php } ?>
    <?php } ?>
</div>
