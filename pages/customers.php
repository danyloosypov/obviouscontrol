

<script>
  async function filter() {
    clearTable();
      const res = await fetch("http://obviouscontrol/pages/filter_customers.php?contacts=" + document.getElementById("contacts").value + "&address=" + 
      document.getElementById("address").value + "&email=" + document.getElementById("email").value + "&active=" + document.getElementById("active1").value +
      "&datestart=" + document.getElementById("datestart").value + "&dateend=" + document.getElementById("dateend").value);
      const data = await res.json();
      console.log(data);
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
        let checked = "";
        let blocked = "";
        if(obj[6] == "Active") {
          checked = "checked";
          blocked = "Unblocked";
        } else {
          blocked = "Blocked";
        }
        const lastCell1 = document.createElement("th");
        lastCell1.innerHTML = "<a href='index.php?edit_user=" + payId + "'><i class='fa fa-pencil'></i> <?php echo $translations['edit-btn-title']['content'] ?> </a>";
        rowElement.appendChild(lastCell1);
        const lastCell3 = document.createElement("th");
        lastCell3.innerHTML = "<div class='custom-control custom-switch'><input type='checkbox' name='submit' onchange='changeStatus(" + payId + ")' class='custom-control-input' id='blocked" + payId + "' " + checked + "><label class='custom-control-label' for='blocked" + payId + "'>" + blocked + "</label></div>";
        rowElement.appendChild(lastCell3);
        const lastCell2 = document.createElement("th");
        lastCell2.innerHTML = "<a href='index.php?delete_user=" + payId + "'><i class='fa fa-trash'></i> <?php echo $translations['delete-btn-title']['content'] ?> </a>";
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
      const res = await fetch("http://obviouscontrol/pages/filter_customers.php");
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
        let checked = "";
        let blocked = "";
        if(obj[6] == "Active") {
          checked = "checked";
          blocked = "Unblocked";
        } else {
          blocked = "Blocked";
        }
        const lastCell1 = document.createElement("th");
        lastCell1.innerHTML = "<a href='index.php?edit_user=" + payId + "'><i class='fa fa-pencil'></i> <?php echo $translations['edit-btn-title']['content'] ?> </a>";
        rowElement.appendChild(lastCell1);
        const lastCell3 = document.createElement("th");
        lastCell3.innerHTML = "<div class='custom-control custom-switch'><input type='checkbox' name='submit' onchange='changeStatus(" + payId + ")' class='custom-control-input' id='blocked" + payId + "' " + checked + " ><label class='custom-control-label' for='blocked" + payId + "'>" + blocked + "</label></div>";
        rowElement.appendChild(lastCell3);
        const lastCell2 = document.createElement("th");
        lastCell2.innerHTML = "<a href='index.php?delete_user=" + payId + "'><i class='fa fa-trash'></i> <?php echo $translations['delete-btn-title']['content'] ?> </a>";
        rowElement.appendChild(lastCell2);
        tablebody.appendChild(rowElement);
      }
  }

</script>

<div class="d-xl-flex justify-content-between align-items-start">
  <h1 class="text-dark font-weight-bold mb-2"> <?php echo $translations['overview-customers-title']['content'] ?> </h1>
</div>

<div style="margin-bottom: 70px;" class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
</div>
  <div class="custombox" style=" display: flex;
            flex-direction: row;">
    <div class="form-group">
      <label for="" class=" control-label"><?php echo $translations['contacts-label-title']['content'] ?></label>
      <div class="">
        <input type="text" id="contacts" name="contacts" value="" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label for="" class="ml-4 control-label"><?php echo $translations['address-label-title']['content'] ?></label>
      <div class="ml-4">
        <input type="text" id="address" name="address" value="" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label for="" class="ml-4 control-label"><?php echo $translations['email-label-title']['content'] ?></label>
      <div class="ml-4">
        <input type="text" id="email" name="email" value="" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label for="" class="ml-4 control-label">Active</label>
      <div class="ml-4">
        <input list="active" id="active1" class="form-control" name="active">
        <datalist id="active">
          <option value="Active">
          <option value="Unactive">
        </datalist>
      </div>
    </div>
    <div class="form-group">
      <label for="" class="ml-4 control-label"><?php echo $translations['datestart-label-title']['content'] ?></label>
      <div class="ml-4">
        <input type="date" id="datestart" name="datestart" class="form-control" value="">
      </div>
    </div>
    <div class="form-group">
      <label for="" class="ml-4 control-label"><?php echo $translations['dateend-label-title']['content'] ?></label>
      <div class="ml-4">
        <input type="date" name="dateend" id="dateend" class="form-control" value="">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="ml-4 control-label"></label>
      <div class="ml-4">
        <input type="submit" onclick="filter()" name="filter" value="<?php echo $translations['filter-btn-title']['content'] ?>" class="btn btn-primary form-control">
      </div>
    </div>

    <div class="form-group">
      <label for="" class="ml-4 control-label"></label>
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
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contacts</th>
                <th>Address</th>
                <th>E-mail</th>
                <th>Password</th>
                <th>Status</th>
                <th>DateStart</th>
                <th>DateEnd</th>
                <th>Edit</th>
                <th>Block</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody id="myTableBody">
              <?php
                $get_pro = "Select * from users";

                $run_pro = mysqli_query($connection, $get_pro);

                while($row_pro = mysqli_fetch_array($run_pro)) {
                  $user_id = $row_pro['user_id'];

                  $username = $row_pro['username'];

                  $contacts = $row_pro['contacts'];

                  $user_address = $row_pro['user_address'];

                  $user_email = $row_pro['user_email'];

                  $user_pass = $row_pro['user_pass'];

                  $user_status = $row_pro['user_status'];

                  $datestart = $row_pro['datestart'];

                  $dateend = $row_pro['dateend'];

              ?>

              <tr>
                <th><?php echo $user_id ?></th>
                <th><?php echo $username ?></th>
                <th><?php echo $contacts ?></th>
                <th><?php echo $user_address ?></th>
                <th><?php echo $user_email ?></th>
                <th><?php echo $user_pass ?></th>
                <th><?php echo $user_status ?></th>
                <th><?php echo $datestart ?></th>
                <th><?php echo $dateend ?></th>
                <th><a href="index.php?edit_user=<?php echo $user_id ?>"><i class="fa fa-pencil"></i> <?php echo $translations['edit-btn-title']['content'] ?> </a></th>
               <!-- <th><a href="index.php?unblock_user=<?php echo $user_id ?>"><i class="fa fa-user-o"></i> Unblock </a></th>
                <th><a href="index.php?block_user=<?php echo $user_id ?>"><i class="fa fa-trash"></i> Block </a></th>-->
                <th>
                  <div class="custom-control custom-switch">
                      <input type="checkbox" name="submit" onchange="changeStatus(<?php echo $user_id ?>)" class="custom-control-input" id="blocked<?php echo $user_id ?>" <?php if($user_status == "Active") {echo " checked";} ?>>
                      <label class="custom-control-label" for="blocked<?php echo $user_id ?>"><?php if($user_status == "Active") {echo "Unblocked";}else { echo "Blocked"; } ?></label>
                  </div>
                </th>
                <th><a href="index.php?delete_user=<?php echo $user_id ?>"><i class="fa fa-trash"></i> <?php echo $translations['delete-btn-title']['content'] ?> </a></th>
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



<script>
  function changeStatus(id) {
   // alert(document.getElementById('blocked' + id).checked);
    if (document.getElementById('blocked' + id).checked) {
        window.open('index.php?unblock_user=' + id, '_self');

    }else{
        window.open('index.php?block_user=' + id, '_self');
    }
  }



</script>


<?php


?>