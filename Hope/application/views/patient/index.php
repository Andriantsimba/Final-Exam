<div class="container">
<?php if($this->session->flashdata('dataflash')): ?>
<div class="row mt-3">
    <div class="col-md-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data patient<strong> successfuly added</strong> 
        <?= $this->session->flashdata('dataflash'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
  </button>
</div>
    </div>
</div>
<?php endif; ?>

<div class="row mt-3">
    <div class="col-md-6">
    <a href="<?= base_url();?>patient/add" class="btn btn-primary">Add new patient</a>

    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <form action="" method="post">
        <div class="input-group">
            <input type="text" class="form-control" 
            placeholder=" Searching Patient data" name="keyword">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
            </div>
        </form>
    </div>
</div>


    <div class="row mt-3">
        <div class="col-md-6">
            <h4>Patient List</h4>
            <?php if(empty($patient)): ?>
                <div class="alert alert-danger" role="alert">
                    This Patient doesn't exist!!
                </div>
            <?php endif?>
            <ul class="list-group">
            <?php foreach($patient as $pt) : ?>
            <li class="list-group-item"> 
                <?= $pt['Name']; ?>
                <a href="<?= base_url();?>patient/delete/<?= $pt['id']; ?>" 
                class=" badge badge-danger float-right" onclick="return confirm('are you sure?');">Delete</a>
                <a href="<?= base_url();?>patient/update/<?= $pt['id']; ?>" 
                class=" badge badge-success float-right" >Update</a>
                <a href="<?= base_url();?>patient/detail/<?= $pt['id']; ?>" 
                class=" badge badge-primary float-right" >Detail</a>
            </li>
            <?php endforeach?>
            </ul>
        </div>
    </div>
</div>