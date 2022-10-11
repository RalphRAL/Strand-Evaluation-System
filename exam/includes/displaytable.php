<?php
include('db_config.php');
$query = "SELECT fullName, gender, email, mobile, address, city, state FROM developers";
$result = mysqli_query($conn, $query);
?>
<table border ="1" cellspacing="0" cellpadding="10">
  <tr>
    <th>S.N</th>
    <th>Full Name</th>
    <th>Gender</th>
    <th>Email</th>
    <th>Mobile No</th>
    <th>Address</th>
    <th>City</th>
    <th>State </th>
  </tr>
<?php
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr>
   <td><?php echo $sn; ?> </td>
   <td><?php echo $data['fullName']; ?> </td>
   <td><?php echo $data['gender']; ?> </td>
   <td><?php echo $data['email']; ?> </td>
   <td><?php echo $data['mobile']; ?> </td>
   <td><?php echo $data['address']; ?> </td>
   <td><?php echo $data['city']; ?> </td>
   <td><?php echo $data['state']; ?> </td>
 <tr>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>
 <?php } ?>
 </table