<?php require_once "inc/header.php"; ?>
<div class="jumbotron m-0 vh-100">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="float-left font-weight-bold"><?= $this->lang->line("title"); ?></h1>
        <div id="mainbox" class="mainbox float-right">&#9776;</div>
        <div id="menu" class="sidemenu">
          <a href="<?= base_url() ?>welcome/categories"><?= $this->lang->line("add_cat_btn"); ?></a>
          <a href="<?php echo base_url(); ?>welcome/insert"><?= $this->lang->line("add_pro_btn"); ?></a>
          <div class="dropdown">
            <a href="" class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->lang->line("select_btn"); ?></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="<?= base_url()?>language/eng">English</a>
              <a class="dropdown-item" href="<?= base_url()?>language/bg">Bangla</a>
              <a class="dropdown-item" href="<?= base_url()?>language/hnd">Hindi</a>
            </div>
          </div>
          <button class="closebtn">&times;</button>
        </div>
        
        <table class="customTable mt-5 text-center table-responsive-xl" id="show">
          <tr class="text-info">
            <th><?= $this->lang->line("row_1_col_1"); ?></th>
            <th><?= $this->lang->line("image"); ?></th>
            <th style="width: 200px;"><?= $this->lang->line("row_1_col_3"); ?></th>
            <th style="width: 150px;"><?= $this->lang->line("row_1_col_4"); ?></th>
            <th style="width: 150px;"><?= $this->lang->line("row_1_col_5"); ?></th>
            <th style="width: 50px;"><?= $this->lang->line("row_1_col_6"); ?></th>
            <th style="width: 250px;"><?= $this->lang->line("short_desc"); ?></th>
            <th style="width: 300px;"><?= $this->lang->line("desc"); ?></th>
            <th><?= $this->lang->line("row_1_col_9"); ?></th>
            <th><?= $this->lang->line("row_1_col_10"); ?></th>
          </tr>
          <?php
            if ($allFetch) {
              $i = 1;
              foreach ($allFetch as $show) { ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><img src="<?php echo base_url(); ?>img/<?php echo $show["image"]; ?>" width='100px' alt=""></td>
                  <td><?php echo $show["pro_name"]; ?></td>
                  <td><?php echo $show["brand"]; ?></td>
                  <td><?php echo $show["name"]; ?></td>
                  <td><?php echo $show["price"]; ?>/-</td>
                  <td><?php echo substr($show["short_desc"], 0, 15); ?>...</td>
                  <td style="word-wrap: break-word;"><?php echo substr($show["description"], 0, 20); ?>...</td>
                  <td><a class="btn btn-outline-warning" href='<?php echo base_url(); ?>welcome/updatePage/<?php echo $show["pro_id"]; ?>/<?php echo $show["categories_id"]; ?>/<?php echo $show["brand_id"]; ?>'><?= $this->lang->line("row_1_col_9"); ?></a></td>
                  <td><a class="btn btn-outline-danger" href="<?php echo base_url(); ?>welcome/delete/<?php echo $show["pro_id"]; ?>"><?= $this->lang->line("row_1_col_10"); ?></a></td>
                </tr>
        <?php }
            }else {
              echo "<td colspan='10'>".$this->lang->line("row_2_colspan_10")."</td>";
            }
          ?>
        </table>
      </div>
    </div>
  </div>
</div>
<?php require_once "inc/footer.php"; ?>