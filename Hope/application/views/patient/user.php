

        <div class="container" style="margin-top:20px">
            <div class="col-md-12">
                <h1 style="text-align:center; margin-bottom:30px">Patient Data</h1>
            </div>
            <table class="table table-striped table table-bordered" id="list_patient">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Departement</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                        foreach($patient as $pt){?>
                        <tr>
                            <td><?=$no++; ?></td>
                            <td><?= $pt->Name;?></td>
                            <td><?= $pt->email; ?></td>
                            <td><?= $pt->Phone; ?></td>
                            <td><?= $pt->departement?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
            <h5> Be welcome, our dear <?= $this->session->userdata('level');?>!!</h5>
        </div>




