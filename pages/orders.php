
<script>
  async function filter() {
      clearTable();
      const res = await fetch("http://obviouscontrol/pages/filter_orders.php?date=" + document.getElementById("date").value + "&status=" + document.getElementById("status").value);
      const data = await res.json();
      var Table = document.getElementById("mytable");
      const tablebody = document.getElementById("myTableBody");
      for (var i = 0; i < data.length; i++){
        const rowElement = document.createElement("tr");
        var obj = data[i];
        var payId = obj[0];
        let flag = 1;
        for (var key in obj){
          if(flag) {
            payId = obj[key];
            flag = 0;
          }
          const cellElement = document.createElement("th");
          cellElement.textContent = obj[key];
          rowElement.appendChild(cellElement);
        }
        const lastCell1 = document.createElement("th");
        lastCell1.innerHTML = "<a href='index.php?edit_order=" + payId + "'><i class='fa fa-pencil'></i> <?php echo $translations['edit-btn-title']['content'] ?> </a>";
        rowElement.appendChild(lastCell1);
        const lastCell2 = document.createElement("th");
        lastCell2.innerHTML = "<a href='index.php?delete_order=" + payId + "'><i class='fa fa-trash'></i> <?php echo $translations['delete-btn-title']['content'] ?> </a>";
        rowElement.appendChild(lastCell2);
        tablebody.appendChild(rowElement);
      }
    
  }

  function clearTable() {
    var Table = document.getElementById("myTableBody");
    Table.innerHTML = "";
  }

  async function clearo() {
    clearTable();
      const res = await fetch("http://obviouscontrol/pages/filter_orders.php");
      const data = await res.json();
      var Table = document.getElementById("mytable");
      const tablebody = document.getElementById("myTableBody");
      for (var i = 0; i < data.length; i++){
        const rowElement = document.createElement("tr");
        var obj = data[i];
        var payId = obj[0];
        let flag = 1;
        for (var key in obj){
          if(flag) {
            payId = obj[key];
            flag = 0;
          }
          const cellElement = document.createElement("th");
          cellElement.textContent = obj[key];
          rowElement.appendChild(cellElement);
        }
        const lastCell1 = document.createElement("th");
        lastCell1.innerHTML = "<a href='index.php?edit_order=" + payId + "'><i class='fa fa-pencil'></i> <?php echo $translations['edit-btn-title']['content'] ?> </a>";
        rowElement.appendChild(lastCell1);
        const lastCell2 = document.createElement("th");
        lastCell2.innerHTML = "<a href='index.php?delete_order=" + payId + "'><i class='fa fa-trash'></i> <?php echo $translations['delete-btn-title']['content'] ?> </a>";
        rowElement.appendChild(lastCell2);
        tablebody.appendChild(rowElement);
      }
  }

</script>


<div class="d-xl-flex justify-content-between align-items-start">
  <h1 class="text-dark font-weight-bold mb-2"> <?php echo $translations['overview-orders-title']['content'] ?> </h1>
</div>

<div style="margin-bottom: 70px;" class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
</div>
  <div class="custombox" style=" display: flex;
            flex-direction: row;">
    
    <div class="form-group">
      <label for="" class="col-md-3 control-label"><?php echo $translations['status-label-title']['content'] ?></label>
      <div class="">
        <input type="text" id="status" class="form-control" name="status">
      </div>
    </div>
    <div class="form-group">
      <label for="" class="col-md-3 ml-4 control-label"><?php echo $translations['date-btn-title']['content'] ?></label>
      <div class="ml-4">
        <input type="date" name="date" id="date" class="form-control" value="">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-md-3 ml-4 control-label"></label>
      <div class="ml-4">
        <input type="submit" name="filter" onclick="filter()" value="<?php echo $translations['filter-btn-title']['content'] ?>" class="btn btn-primary form-control">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-md-3 control-label"></label>
      <div class="ml-4">
        <input type="submit" name="clear" onclick="clearo()" value="<?php echo $translations['clear-btn-title']['content'] ?>" class="btn btn-danger form-control">
      </div>
    </div>
  </div>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">

      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Contacts</th>
                <th>E-mail</th>
                <th>Address</th>
                <th>Date</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody id="myTableBody">
              <?php
                $get_pro = "Select * from orders";

                $run_pro = mysqli_query($connection, $get_pro);

                while($row_pro = mysqli_fetch_array($run_pro)) {
                  $order_id = $row_pro['order_id'];

                  $order_date = $row_pro['order_date'];

                  $order_status = $row_pro['order_status'];

                  $user_id = $row_pro['user_id'];

                  $get_info = "Select * from users where user_id = '$user_id'";

                  $run_info = mysqli_query($connection, $get_info);

                  while($row_info = mysqli_fetch_array($run_info)) {
                    $contacts = $row_info['contacts'];

                    $user_address = $row_info['user_address'];

                    $user_email = $row_info['user_email'];
                  }



              ?>

              <tr>
                <th><?php echo $order_id ?></th>
                <th><?php echo $contacts ?></th>
                <th><?php echo $user_email ?></th>
                <th><?php echo $user_address ?></th>
                <th><?php echo $order_date ?></th>
                <th><?php echo $order_status   ?></th>
                <th><a href="index.php?edit_order=<?php echo $order_id ?>"><i class="fa fa-pencil"></i> <?php echo $translations['edit-btn-title']['content'] ?> </a></th>
                <th><a href="index.php?delete_order=<?php echo $order_id ?>"><i class="fa fa-trash"></i> <?php echo $translations['delete-btn-title']['content'] ?> </a></th>
              </tr>

              <?php
                }
              ?>


            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
