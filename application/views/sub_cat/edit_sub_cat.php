<?php require_once dirname(__FILE__).'/../inc/header.php'; ?>
<div class="jumbotron m-0 vh-100">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-8 col-md-6 col-lg-5 offset-sm-2 offset-md-3 offset-lg-3">
        <div class="shadow-lg p-4">
          <h2 class="text-center mb-3 pb-1 custom__border text-info"><?= $this->lang->line("edit_sub_cat_title"); ?></h2>
          <form autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="category" class="font-weight-bold"><?= $this->lang->line("select_cat"); ?>:</label>
              <select name="category" class="form-control">
                <option value=""><?= $this->lang->line("select_cat"); ?></option>
                <?php
                  foreach ($cat as $show_cat) {
                    if ($show_cat["id"] == $cat_id) {
                      echo "<option selected value='".$show_cat['id']."'>".$show_cat['name']."</option>";
                    } else {
                      echo "<option value='".$show_cat['id']."'>".$show_cat['name']."</option>";
                    }
                  }
                ?>
              </select>
              <?php echo form_error("category", "<span class='text-danger font-weight-bold'>", "</span>"); ?>
            </div>
            <?php foreach ($fetch_sub_cat as $key) { ?>
              <div class="form-group">
                <label class="font-weight-bold" for=""><?= $this->lang->line("sub_cat_name"); ?>:</label>
                <input type="text" class="form-control" name="sub_category" placeholder="<?= $this->lang->line("sub_cat_name_placeholder"); ?>" value="<?= $key["sub_cat_name"] ?>">
                <?php echo form_error("sub_category", "<span class='text-danger font-weight-bold'>", "</span>"); ?>
              </div>
            <?php } ?>
            <button type="submit" name="submit" class="btn-block btn btn-outline-success"><?= $this->lang->line("submit"); ?></button>
            <a href="<?php echo base_url(); ?>welcome/categories" class="btn btn-outline-dark btn-block"><?= $this->lang->line("back"); ?></a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once dirname(__FILE__).'/../inc/footer.php'; ?>