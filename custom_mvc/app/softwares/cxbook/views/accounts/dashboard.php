<?php build('content')?>

<div class="row layout-spacing layout-top-spacing" id="cancel-row">
  <div class="col-md-12">
    <?php Flash::show()?>
    <h3>Dashboard</h3>
    <table class="table">
      <thead>
        <tr>
          <th>Account Holder</th>
          <th><?php echo $account->first_name . ' ' . $account->last_name?></th>
        </tr>

        <tr>
          <th>Email</th>
          <th><?php echo $account->email?></th>
        </tr>

        <tr>
          <th>Joined</th>
          <th><?php echo date_long($account->created_on , 'M d, Y h:i:s a')?></th>
        </tr>
      </thead>
    </table>
  </div>

</div>
<?php endbuild()?>


<?php appGrab('templates/base')?>
