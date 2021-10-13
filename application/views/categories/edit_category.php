<?php require_once dirname(__FILE__).'/../inc/header.php'; ?>
<div class="jumbotron m-0 vh-100">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-8 col-md-6 col-lg-5 offset-sm-2 offset-md-3 offset-lg-3">
        <div class="shadow-lg p-4">
          <h1 class="text-center mb-3 pb-1 custom__border text-info"><?= $this->lang->line("edit_cat_title"); ?></h1>
          <form autocomplete="off" method="post" enctype="multipart/form-data">
            <?php foreach ($upCatFetch as $key) { ?>
              <div class="form-group">
                <label class="font-weight-bold" for=""><?= $this->lang->line("cat_name"); ?>:</label>
                <input type="text" class="form-control" name="category" placeholder="<?= $this->lang->line("cat_name_placeholder"); ?>" value="<?php echo $key["name"]; ?>">
                <?php echo form_error("category", "<span class='text-danger font-weight-bold'>", "</span>"); ?>
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