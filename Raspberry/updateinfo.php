
<?php


?>


<h1 class="mb-5">Update</h1>

    <form method="put" action="api/update_info.php">
    <!--<form method="put" action="http://192.168.0.5/phpservice.php">-->
        <input type="hidden" name="username" value='<%= Session["username"] %>'>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" >
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" >
    </div>
        <div class="mb-3">
        <label for="contacts" class="form-label">Contacts</label>
        <input type="text" class="form-control" id="contacts" name="contacts" >
    </div>
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">Change</button>
    </div>
</form>



