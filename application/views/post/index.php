<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('./includes/header'); ?>
    <title>Post Blogger</title>
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-lg-12 my-5">
                <h2 class="text-center mb-3">Post Blogger</h2>
            </div>
        </div>

        <div class="col-lg-12">

            <div class="d-flex justify-content-between mb-3">
                <h4>Manage Posts</h4>
                <a href="<?= base_url('/blog/create') ?>" class="btn btn-success"> <i class="fas fa-plus"></i> Add New
                    Post</a>
            </div>

            <table class="table table-bordered table-default">

                <thead class="thead-light">
                    <tr>
                        <th width="2%">#</th>
                        <th width="25%">Title</th>
                        <th width="53%">Description</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    foreach ($blog_data as $key => $value)
                    {
                        ?>
                        <tr>
                            <td>
                                <?php echo $i; ?>
                            </td>
                            <td>
                                <?php echo $value->name ?>
                            </td>
                            <td>
                                <?php echo $value->description ?>
                            </td>
                            <td>
                                <a href="<?= base_url('/blog/edit/' . $value->id) ?>" class="btn btn-primary"> <i
                                        class="fas fa-edit"></i>
                                    Edit </a>
                                <a href="<?= base_url('/blog/delete/' . $value->id) ?>" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this record?')"> <i
                                        class="fas fa-trash"></i> Delete </a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                </tbody>

            </table>
        </div>

    </div>
    <?php $this->load->view('./includes/footer'); ?>
</body>

</html>