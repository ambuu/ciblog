<h2><?=$title;?></h2>
<?php echo validation_errors(); ?>

<?php echo form_open_multipart('categories/create');?>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter name">
        <br>
        <button type="submit" class="btn btn-default">Submit</button>
    </div>
</from>