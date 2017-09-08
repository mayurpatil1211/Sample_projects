<?php include('header.php');?>
<body style="background-color: #616161" ng-app="mainApp">
   <div>
      
      <div class="col-md-6">
         <a href="getData">
         <button class="btn btn-lg btn-primary" id="job">
         VIEW LIST
         </button>
         </a>
      </div>
   </div>
   <!-- 
      <div>
          <a href="<?php echo base_url();?>application/views/job_listing.php">
              <button class="btn btn-lg btn-primary">
                  VIEW JOBS
              </button>
          </a>
      </div> -->
   <div class="container" id="main-content">
   <div id="header-campaign"></div>
   <div class="row job_page">
      <div class="col-md-10 col-md-offset-1 col-xs-12 col-sm-12">
         <div class="sheet">
           
            <form action="insertData" method="post" name="myForm" ng-controller="app" novalidate>
              

               <div class="section">

                  <div class="form-group control-group">
                     <label class="col-xs-12 col-sm-3 col-md-2 control-label">Name<span class="help-required" title="Required">*</span></label>
                     <div class="col-xs-12 col-sm-9 col-md-10 controls space-in-form">
                        <input autofocus class="form-control " maxlength="100" minlength="1" name="name" type="text" value="" ng-model="name" required>
                      
                        <span ng-show = "myForm.name.$invalid && myForm.name.$dirty" class="err">Name is required.</span>
                        
                     
                     </div>
                  </div>


                  <div class="form-group control-group">
                     <label class="col-xs-12 col-sm-3 col-md-2 control-label">Email<span class="help-required" title="Required">*</span></label>
                     <div class="col-xs-12 col-sm-9 col-md-10 controls space-in-form">
                        <input autofocus class="form-control " maxlength="100" minlength="1" id="email" name="email" type="email" ng-model="email" required>
                      
                        <span ng-show = "myForm.email.$invalid && myForm.email.$dirty" class="err">Valid Email is required.</span>
                        
                     
                     </div>
                  </div>



                  <div class="form-group control-group space-in-form">
                     <label class="col-xs-12 col-sm-3 col-md-2">Address<span class="help-required" title="Required">*</span></label>
                     <div class="col-xs-12 col-sm-9 col-md-10 form-group  space-in-form">
                        <input class="form-control field-address " maxlength="80" minlength="3" name="address" type="text" value=""  ng-model="address" required>
                    
                        <span ng-show = "myForm.address.$invalid && myForm.address.$dirty" class="err">Address is required.</span>
                        
                
                     </div>
                  </div>


                   <div class="form-group control-group space-in-form">
                     <label class="col-xs-12 col-sm-3 col-md-2">Contact Number<span class="help-required" title="Required">*</span></label>
                     <div class="col-xs-12 col-sm-9 col-md-10 form-group  space-in-form">
                        <input class="form-control field-address" maxlength="11" minlength="10" name="contact" type="text" value=""  ng-model="contact" required>
                    
                        <span ng-show = "myForm.contact.$invalid && myForm.contact.$dirty" class="err">contact number is required.</span>
                        
                
                     </div>
                  </div>


                  <div>
                     <input type="submit" class="btn btn-lg btn-primary btn-post" 
                      ng-disabled="myForm.name.$invalid || myForm.email.$invalid || myForm.address.$invalid || myForm.contact.$invalid"
                       name="post">
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.3/angular.min.js"></script> -->


   <script type="text/javascript">
     var app = angular.module('mainApp', []);
     app.controller('app', function($scope){
      console.log("hi");
     })
   </script>
</body>
</html>