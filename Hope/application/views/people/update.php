<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                From people Update data
            </div>
            <div class="card-body">
            <?php if(validation_errors()): ?>
            <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
            </div>
             <?php endif ;?>   

                <form action="" method="post">
                <input name="id" id=""  type="hidden" value="<?= $people['id'];?>">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $people['name'];?>" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $people['email'];?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= $people['phone'];?>" >
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?= $people['address'];?>" >

                    </div>
                    <button type="submit" name="update" class="btn btn-primary float-right">update Data</button>
                </form> 
            </div>
            </div>  
      
        </div>
    </div>
</div>