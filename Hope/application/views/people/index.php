<div class="container">
    <h3 class="mt-3">List of volunteer </h3>

        <div class="row">
            <div class="col-md-6">
            <form action="<?= base_url('people');  ?>" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search keyword.." 
                name="keyword" autocomplete="off" autofocus="on">
                <div class="input-group-append">
                    <input class="btn btn-primary" type="submit" name="submit" 
                     id="button-addon2">
                </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                    <a href="<?= base_url();?>people/add" 
                    class="btn btn-info">Add new people</a>
                    </div>
                </div>

                </form>
                    
                


            </div>
        </div>

    <div class="row">
        <div class="col-md-10">
            <h5>Result: <?= $total_rows; ?></h5>

                <table class="table">
                    <thead>
                       <tr>
                           <th>#</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                    <?php  if (empty('$people')): ?>
                        <tr>
                            <td>
                            <div class="alert alert-danger" role="alert">
                                data not found!!!!
                                </div>
                            </td>
                        </tr>

                    <?php endif; ?>
                    <?php 
                     foreach ($people as $pp ) : ?>
                        <tr>
                        <td><?= ++$start?></td>
                        <td><?= $pp['name']; ?></td>
                        <td><?= $pp['email']; ?></td>
                        <td>
                            <a href="<?= base_url();?>people/detail/<?= $pp['id']; ?>" class="badge badge-warning">detail</a>
                            <a href="<?= base_url();?>people/update/<?=$pp['id']; ?>" class="badge badge-success">edit</a>
                            <a href="<?= base_url(); ?>people/delete/"<?= $pp['id']; ?> onclick="return confirm('are you sure?');" class="badge badge-danger">delete</a>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                    <?= $this->pagination->create_links(); ?>
        </div>
    </div>
</div>