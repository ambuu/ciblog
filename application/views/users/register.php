
<?php echo validation_errors(); ?>
<?php echo form_open('users/register'); ?>
   <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="text-center"><?= $title; ?></h1>
             <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password2" placeholder="Confirm password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
   </div>

<?php echo form_close();?>