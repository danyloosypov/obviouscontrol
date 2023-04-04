<script>
  async function filter() {
      clearTable();
      const res = await fetch("http://obviouscontrol/pages/filter_payments.php?date=" + document.getElementById("date").value);
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
        const lastCell = document.createElement("th");
        lastCell.innerHTML = "<a href='index.php?delete_payment=" + payId + "'><i class='fa fa-trash'></i> <?php echo $translations['delete-btn-title']['content'] ?> </a>";
        rowElement.appendChild(lastCell);
        tablebody.appendChild(rowElement);
      }
    
  }

  function clearTable() {
    var Table = document.getElementById("myTableBody");
    Table.innerHTML = "";
  }

  async function clearo() {
    clearTable();
      const res = await fetch("http://obviouscontrol/pages/filter_payments.php");
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
        const lastCell = document.createElement("th");
        lastCell.innerHTML = "<a href='index.php?delete_payment=" + payId + "'><i class='fa fa-trash'></i> <?php echo $translations['delete-btn-title']['content'] ?> </a>";
        rowElement.appendChild(lastCell);
        tablebody.appendChild(rowElement);
      }
  }

</script>


<div class="d-xl-flex justify-content-between align-items-start">
  <h1 class="text-dark font-weight-bold mb-2"> <?php echo $translations['overview-payments-title']['content'] ?></h1>
</div>

<div style="margin-bottom: 70px;" class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
</div>
    <div class="custombox" style=" display: flex;
            flex-direction: row;">
    <div class="form-group" >
      <div class="">
        <input type="date" name="date" id="date" id="start" class="form-control" value="">
      </div>
    </div>

    <div class="form-group">
      <div class="ml-4">
        <input type="submit" onclick="filter()" name="filter" value="<?php echo $translations['filter-btn-title']['content'] ?>" class="btn btn-primary form-control">
      </div>
    </div>

    <div class="form-group">
      <div class="ml-4">
        <input type="submit" onclick="clearo()" name="clear" value="<?php echo $translations['clear-btn-title']['content'] ?>" class="btn btn-danger form-control">
      </div>
    </div>
  </div>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">

      <div class="panel-body">
        <div class="table-responsive">
          <table id="mytable" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>user_id</th>
                <th>order_id</th>
                <th>Date</th>
                <th>Sum</th>
                <th>Period</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody id="myTableBody">
              <?php

                $get_pro = "Select * from payments";

                $run_pro = mysqli_query($connection, $get_pro);

                while($row_pro = mysqli_fetch_array($run_pro)) {
                  $payment_id = $row_pro['payment_id'];

                  $user_id = $row_pro['user_id'];

                  $order_id = $row_pro['order_id'];

                  $payment_date = $row_pro['payment_date'];

                  $payment_sum = $row_pro['payment_sum'];

                  $period = $row_pro['period'];

              ?>

              <tr>
                <th><?php echo $payment_id ?></th>
                <th><?php echo $user_id ?></th>
                <th><?php echo $order_id ?></th>
                <th><?php echo $payment_date ?></th>
                <th><?php echo $payment_sum   ?></th>
                <th><?php echo $period ?></th>
                <th><a href="index.php?delete_payment=<?php echo $payment_id ?>"><i class="fa fa-trash"></i> <?php echo $translations['delete-btn-title']['content'] ?> </a></th>
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


