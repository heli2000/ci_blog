<!doctype html>
<html lang="en">

<head>
    <?php $this->load->view('./includes/header'); ?>
    <title>Add New Post</title>
</head>

<body>

    <div class="container">
        <div class="row">

            <div class="col-lg-12 my-5">
                <h2 class="text-center mb-3">Post Blogger</h2>
            </div>

            <div class="col-lg-12">

                <div class="d-flex justify-content-between ">
                    <h4>
                        <?php echo $edit === true ? "Edit Post" : "Add New Post" ?>
                    </h4>
                    <a class="btn btn-warning" href="<?php echo base_url("/blog"); ?>"> <i
                            class="fas fa-angle-left"></i>
                        Back</a>
                </div>

                <form method="post"
                    action="<?php echo $edit === true ? base_url('blog/update/' . $edit_data->blog_id) : base_url('blog/store'); ?>">

                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" type="text" name="name"
                            value="<?php echo $edit === true ? $edit_data->name : "" ?>">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control"
                            name="description"><?php echo $edit === true ? $edit_data->description : "" ?></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Submit </button>
                    </div>

                </form>


            </div>
        </div>
    </div>



    <?php $this->load->view('./includes/footer'); ?>

</body>

</html>