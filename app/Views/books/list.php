<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Simple Codeigniter 4 CRUD Application</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css');?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css');?>">
</head>
<body>
	<div class="container-fluid bg-purple1">
		<div class="container" style="padding-bottom: 20px;">



  <h2>Books Table</h2>

<a class="btn btn-primary text-right" href="<?= base_url('books/create');?>">ADD</a>
  
  <p><?php if (!empty($session->getFlashdata('success'))) {  ?>
    
      <div class="alert alert-success alert-dismissible"><?= $session->getFlashdata('success');?></div>


 <?php }?>

 <p><?php if (!empty($session->getFlashdata('error'))) {  ?>
    
      <div class="alert alert-danger alert-dismissible"><?= $session->getFlashdata('error');?></div>


 <?php }?>
   
 </p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>ISBN No</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 

            if (!empty($books)) {
              
                  $tl='1';
                  foreach ($books as $value) {
                   ?>


      <tr>
        <td><?= $tl++;?></td>
        <td><?= $value['title'];?></td>
        <td><?= $value['author'];?></td>
        <td><?= $value['isbn_no'];?></td>
        <td><a class="btn btn-primary" href="<?= base_url('books/edit').'/'. $value['id'];?>">EDIT</a> | <a class="btn btn-danger" href="#" onclick="deleteConfirm(<?= $value['id'];?>)">DELETE</a></td>
      </tr>
       <?php
                  }

            }

      ?>
    </tbody>
  </table>

  <script type="text/javascript">
    function deleteConfirm(id) {

      if (confirm("Are You sure want to Delete?")) {
          window.location.href='<?= base_url('books/delete').'/'?>'+id;
      }
      // body...
    }
  </script>
</div>
	</div>
</body>
</html>