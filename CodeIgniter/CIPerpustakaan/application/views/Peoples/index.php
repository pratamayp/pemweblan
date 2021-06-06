<div class="container">
    <div class="row">
        <div class="col-md-10 offset-1">

            <h3 class="text-center m-3"><?= $title ?></h3>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach($peoples as $people) : ?>
                    <tr>
                        <td><?= ++$start ?></td>
                        <td><?= $people['nama'] ?></td>
                        <td><?= $people['email'] ?></td>
                        <td>
                            <a href="" class="badge badge-success">
                                <i class="fa fa-info" aria-hidden="true"></i>
                                Details
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                
                </tbody>
            </table>

            <!-- pagination -->
                <?= $this->pagination->create_links() ?>

        </div>
    </div>
</div>