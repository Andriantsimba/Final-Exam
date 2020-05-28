<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                From patient Update data
            </div>
            <div class="card-body">
            <?php if(validation_errors()): ?>
            <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
            </div>
             <?php endif ;?>   

                <form action="" method="post">
                <input name="id" id=""  type="hidden" value="<?= $patient['id'];?>">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $patient['Name'];?>" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $patient['email'];?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= $patient['Phone'];?>" >
                    </div>
                    <div class="form-group">
                        <label for="departement">Departement</label>
                        <select class="form-control" id="departement" name="departement" value="<?= $patient['departement']; ?>">
                            <?php foreach ($departement as $dep ): ?>
                                <?php if ($dep == $patient['departement']): ?>
                                    <option value="<?= $dep; ?>" selected><?= $dep; ?></option>
                               
                                <?php else: ?>
                                    <option value="<?= $dep; ?>"><?= $dep; ?></option>
                                
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary float-right">update Data</button>
                </form> 
            </div>
            </div>  
      
        </div>
    </div>
</div>