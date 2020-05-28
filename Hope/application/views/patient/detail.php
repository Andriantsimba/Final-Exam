<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

        <div class="card">
            <div class="card-header">
                Patient Detailed data
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= $patient['Name']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $patient['email']; ?></h6>
                <p class="card-text"><?= $patient['Phone']; ?></p>
                <p class="card-text"><?= $patient['departement']; ?></p>
                <a href="<?= base_url(); ?>patient" class="btn btn-primary">Back</a>
            </div>
            </div>
        </div>
    </div>
</div>