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



  <h2>ADD Record Table</h2>

<a class="btn btn-primary text-right mt-10 mb-10" href="<?= base_url('/books');?>">Back</a>
  
              
  <form action="" method="post" name="createForm" id="createForm">
    <div class="form-group">
      <label for="text">Title:</label>
      <input type="text" class="form-control <?php echo (isset($validation) &&  $validation->hasError('title')) ? 'is-invalid' : '';?>" id="text" placeholder="Enter title" name="title" value="<?= set_value('title');?>">

      <?php 
           
          if(isset($validation) &&  $validation->hasError('title'))
          {
            ?>
            <span class='error'><?= $validation->getError('title');?></span>
            <?php 
          }

      ?>


    </div>
    
    <div class="form-group">
      <label for="text">Author:</label>
      <input type="text" class="form-control <?php echo (isset($validation) &&  $validation->hasError('author')) ? 'is-invalid' : '';?>" id="text" placeholder="Enter Author" name="author" value="<?= set_value('author');?>">

      <?php 

          if(isset($validation) &&  $validation->hasError('author'))
          {
            ?>
            <span class='error'><?= $validation->getError('author');?></span>
            <?php 
          }

      ?>


    </div>

    <div class="form-group">
      <label for="pwd">ISBN No:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter ISBN No" name="isbn_no" value="<?= set_value('isbn_no');?>">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
	</div>
</body>
</html>