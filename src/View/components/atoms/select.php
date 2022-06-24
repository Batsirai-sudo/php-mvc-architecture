<div class="input__wrapper">
    <label class="input__label">Sort Strategy </label>
    <select  name="sortStrategy"  onfocus="setFocus(true)" onblur="setFocus(false)">
        <option <?php if(isset($sortStrategy)){ ?>  selected <?php } ?> value="">Select Strategy</option>
        <?php foreach ($sortMethods   as $method) { ?>
            <option  <?php  if(isset($sortStrategy) &&  $sortStrategy  === $method){ ?> selected  <?php } ?>  value="<?php echo $method ?>"><?php echo $method ?></option>
        <?php } ?>
    </select>
</div>
