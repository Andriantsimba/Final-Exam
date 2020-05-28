<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                 New appointment register
            </div>
            <div class="card-body">
            <?php if(validation_errors()): ?>
            <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
            </div>
             <?php endif ;?>   

                <form action="" method="post">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" >
                    </div>
                    <div class="form-group">
                        <label for="departement">Departement</label>
                        <select class="form-control" id="departement" name="departement">
                            <option value="Cardiology">Cardiology</option>
                            <option value="dentistry">Dentistry</option>
                            <option value="optical">Optical</option>
                            <option value="Neurosurgery">Neurosurgery</option>
                            <option value="Dermatology">Dermatology</option>
                            <option value="Pediatrics">Pediatrics</option>
                            <option value="Plastic Surgery">Plastic Surgery</option>
                        </select>
                    </div>

                    <a href="<?= base_url();?>user" type="button" class="btn btn-primary">back</a>
                    <button type="submit" name="add" class="btn btn-primary float-right">Add Data</button>
                </form> 
            </div>
            </div>  
      
        </div>
    </div>
</div>