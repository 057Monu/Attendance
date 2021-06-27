<?php
$title = "Index";
require_once "includes/header.php";
require_once 'db/conn.php';

$results = $crud->getSpecialties();

?>

    <h2 style="font-family:cursive;" class="text-center">Registration For IT Conference</h2>
<br/>
     <form method="post" action="success.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input required type="text" class="form-control"  id="firstname" name="firstname" placeholder="Enter First name">
        </div>

        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input required  type="text" class="form-control"  id="lastname" name="lastname" placeholder="Enter Last name">
        </div>

        <div class="form-group">
            <label for="dob">Date Of Birth</label>
            <input type="text" class="form-control" id="dob" name="dob" placeholder="Enter D.O.B">
        </div>

        <div class="form-group">
            <label for="areaofinterest">Area of Expertise</label>
                <select class="form-control"  id="areaofinterest" name="areaofinterest">
                   <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                   <option value="<?php echo $r['speciality_id'] ?>"><?php echo $r['name']; ?></option>
                <?php }?>
                </select>
        </div>

        <div class="form-group">
            <label for="email1">Email address</label>
            <input required type="email" class="form-control" id="email1" name="email1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp" placeholder="Enter Phone number">
            <small id="phoneHelp" class="form-text text-muted">We'll never share your contact number with anyone else.</small>
        </div>

        <div class="custom-file">
            <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar" >
            <label class="custom-file-label" for="avatar1">Choose File</label>
            <small id="avatar" class="form-text text-danger">File Upload is Optional</small>
        </div>

        <div style="text-align:center">
        <button type="submit" name="submit" style="font-size: 16px;margin-top:22px;padding:6px 15px;" class="btn btn-primary">Submit</button>
      </div>
     </form>

     <div style="margin-bottom:22px"></div>

<?php
  require_once "includes/footer.php";
?>
