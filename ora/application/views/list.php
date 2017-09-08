<?php include('header.php');?>
<body class="job-list">
   <div>
      <div class="col-md-12">
         <a href="newData">
         <button class="btn btn-lg btn-primary" id="job">
         INSERT NEW DATA
         </button>
         </a>
      </div>
   </div>
   <div class=" container  table-data">
   <table class="table table-striped table-defaults">
     <thead class="table table-striped table-default">
    <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Operation</th>
            </tr>
         </thead>
      <?php foreach($data as $data) { ?> 
         

        
         <tbody>
            <td><?php echo $data->name; ?></td>
            <td><?php echo $data->email; ?></td>
            <td><?php echo $data->address; ?></td>
            <td><?php echo $data->contact; ?></td>
            <td><a href="<?php echo site_url('Welcome/delete/'.$data->id); ?>"><button class="btn btn-small btn-primary list-button">Delete</button></a></td>
         </tbody>
            
         
      <?php } ?>
      </table>
   </div>
</body>
</html>