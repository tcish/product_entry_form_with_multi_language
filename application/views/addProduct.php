<?php require_once "inc/header.php"; ?>
<div class="jumbotron m-0">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-8 col-md-6 col-lg-5 offset-sm-2 offset-md-3 offset-lg-3">
        <div class="shadow-lg p-4">
          <h1 class="text-center mb-3 pb-1 custom__border text-info"><?= $this->lang->line("entry_title"); ?></h1>
          <form autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="productCategories" class="font-weight-bold"><?= $this->lang->line("select_cat"); ?>:</label>
              <select name="productCategories" class="form-control">
                <option value=""><?= $this->lang->line("select_cat"); ?></option>
                <?php
                  foreach ($cat as $showCat) {
                   echo "<option value='".$showCat['id']."'>".$showCat['name']."</option>";
                  }
                ?>
              </select>
              <?php echo form_error("productCategories", "<span class='text-danger font-weight-bold'>", "</span>"); ?>
            </div>
            
            <div class="form-group">
              <label class="font-weight-bold" for=""><?= $this->lang->line("select_brand"); ?>:</label>
              <select name="productBrand" class="form-control">
                <option value=""><?= $this->lang->line("select_brand"); ?></option>
                <?php
                  foreach ($brands as $showBrand) {
                   echo "<option value='".$showBrand['brand_id']."'>".$showBrand['brand']."</option>";
                  }
                ?>
              </select>
              <?php echo form_error("productBrand", "<span class='text-danger font-weight-bold'>", "</span>"); ?>
            </div>
            <div class="form-group">
              <label class="font-weight-bold" for=""><?= $this->lang->line("pro_name"); ?>:</label>
              <input type="text" class="form-control" name="productName" placeholder="<?= $this->lang->line("pro_name_placeholder"); ?>" value="<?php echo set_value("productName"); ?>">
              <?php echo form_error("productName", "<span class='text-danger font-weight-bold'>", "</span>"); ?>
            </div>
            <div class="form-group">
              <label class="font-weight-bold" for=""><?= $this->lang->line("pro_price"); ?>:</label>
              <input type="text" class="form-control" name="productPrice" placeholder="<?= $this->lang->line("pro_price_placeholder"); ?>" value="<?php echo set_value("productPrice"); ?>">
              <?php echo form_error("productPrice", "<span class='text-danger font-weight-bold'>", "</span>"); ?>
            </div>
            <div class="form-group">
              <label class="font-weight-bold" for=""><?= $this->lang->line("image"); ?>:</label>
              <input type="file" class="form-control" name="productImage">
              <span class="text-danger font-weight-bold"><?php if (isset($file)) {echo $file;} ?></span>
            </div>
            <div class="form-group">
              <label class="font-weight-bold"><?= $this->lang->line("short_desc"); ?>: </label>
              <textarea name="short_desc" rows="3" style="width: 100%;" placeholder="<?= $this->lang->line("short_desc_placeholder"); ?>"></textarea>
              <?php echo form_error("short_desc", "<span class='text-danger font-weight-bold'>", "</span>"); ?>
            </div>
            <div class="form-group">
              <label class="font-weight-bold"><?= $this->lang->line("desc"); ?>: </label>
              <textarea name="desc" rows="3" style="width: 100%;" placeholder="<?= $this->lang->line("desc_placeholder"); ?>"></textarea>
              <?php echo form_error("desc", "<span class='text-danger font-weight-bold'>", "</span>"); ?>
            </div>
            <button type="submit" name="submit" class="btn-block btn btn-outline-success"><?= $this->lang->line("submit"); ?></button>
            <a href="<?php echo base_url(); ?>welcome/" class="btn btn-outline-dark btn-block"><?= $this->lang->line("back"); ?></a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once "inc/footer.php"; ?>