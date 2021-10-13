<?php require_once dirname(__FILE__).'/../inc/header.php'; ?>

<!-- for category -->
<div class="jumbotron m-0 h-auto">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="float-left font-weight-bold"><?= $this->lang->line("cat_title"); ?></h1>
        <a href="<?= base_url()?>welcome/" class="btn btn-outline-info float-right"><?= $this->lang->line("view_pro"); ?></a>
        <a href="<?= base_url()?>welcome/cat_insert" class="btn btn-outline-info float-right"><?= $this->lang->line("add_cat_btn"); ?></a>
        <table class="customTable mt-5 text-center table-responsive-xl" id="show">
          <tr class="text-info">
            <th><?= $this->lang->line("row_1_col_1"); ?></th>
            <th><?= $this->lang->line("cat_name"); ?></th>
            <th style="width: 200px"><?= $this->lang->line("row_1_col_9"); ?></th>
            <th style="width: 200px"><?= $this->lang->line("row_1_col_10"); ?></th>
          </tr>
          <?php
            if ($cat) {
              $i = 1;
              foreach ($cat as $show) { ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $show["name"]; ?></td>
                  <td><a class="btn btn-outline-warning" href='<?php echo base_url(); ?>welcome/updateCat/<?php echo $show["id"]; ?>/'><?= $this->lang->line("row_1_col_9"); ?></a></td>
                  <td><a class="btn btn-outline-danger" href="<?php echo base_url(); ?>welcome/deleteCat/<?php echo $show["id"]; ?>"><?= $this->lang->line("row_1_col_10"); ?></a></td>
                </tr>
        <?php }
            }else {
              echo "<td colspan='10'>".$this->lang->line("no_cat_found")."</td>";
            }
          ?>
        </table>
      </div>
    </div>
  </div>

  <!-- For sub category -->
  <div class="container pt-5">
    <div class="row">
      <div class="col-12">
        <h1 class="float-left font-weight-bold"><?= $this->lang->line("sub_cat_title"); ?></h1>
        <a href="<?= base_url()?>welcome/sub_cat_insert" class="btn btn-outline-info float-right"><?= $this->lang->line("add_sub_cat_btn"); ?></a>
        <table class="customTable mt-5 text-center table-responsive-xl" id="show">
          <tr class="text-info">
            <th><?= $this->lang->line("row_1_col_1"); ?></th>
            <th><?= $this->lang->line("cat_name"); ?></th>
            <th><?= $this->lang->line("sub_cat_name"); ?></th>
            <th style="width: 200px"><?= $this->lang->line("row_1_col_9"); ?></th>
            <th style="width: 200px"><?= $this->lang->line("row_1_col_10"); ?></th>
          </tr>
          <?php
            if ($sub_cat) {
              $i = 1;
              foreach ($sub_cat as $show) { ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $show["name"]; ?></td>
                  <td><?php echo $show["sub_cat_name"]; ?></td>
                  <td><a class="btn btn-outline-warning" href='<?php echo base_url(); ?>welcome/updateSubCat/<?php echo $show["sub_cat_id"]; ?>/<?= $show["cat_id"] ?>'><?= $this->lang->line("row_1_col_9"); ?></a></td>
                  <td><a class="btn btn-outline-danger" href="<?php echo base_url(); ?>welcome/deleteSubCat/<?php echo $show["sub_cat_id"]; ?>"><?= $this->lang->line("row_1_col_10"); ?></a></td>
                </tr>
        <?php }
            }else {
              echo "<td colspan='10'>".$this->lang->line("no_sub_cat_found")."</td>";
            }
          ?>
        </table>
      </div>
    </div>
  </div>
</div>
<?php require_once dirname(__FILE__).'/../inc/footer.php'; ?>