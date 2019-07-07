<div class="container">
   <!-- Outer Row -->
   <div class="row justify-content-center">

       <div class="col-lg-7">

           <div class="card o-hidden border-0 shadow-lg my-5">
               <div class="card-body p-0">
                   <!-- Nested Row within Card Body -->
                   <div class="row">
                       <div class="col-lg">
                           <div class="p-5">
                               <div class="text-center">
                                   <h1 class="h4 text-gray-900 mb-4"><?= $title; ?></h1>
                               </div>

                               <?= $this->session->flashdata('message'); ?>

                               <form class="user" method="post" action="<?= base_url('auth/forgotPassword');?>" >
                                   <div class="form-group">
                                       <!--type for emai is just enter on text because later that will validated by code igniter-->
                                       <!--add set value to repopulating the form for user which input wrong format on form-->
                                       <input type="text" class="form-control form-control-user" id="users_email" name="users_email"  placeholder="Masukkan Email..." value="<?= set_value('users_email');?>">

                                       <?= form_error('email','<small class="text-danger ml-3">','</small>'); ?>
                                   </div>

                                   <button type="submit" class="btn btn-primary btn-user btn-block">
                                      Reset Password
                                   </button>
                               </form>
                               <hr>
                               <div class="text-center">
                                   <a class="small" href="<?= base_url('auth'); ?>">Back to login</a>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
