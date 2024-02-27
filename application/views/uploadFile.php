<html>

<head>
    <title>Upload Form</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <?php echo form_open_multipart(base_url() . 'AWSBucket/uploadFile'); ?>
    <?php
    if ($this->session->flashdata('success')) {
        echo $this->session->flashdata('success');
    } else if ($this->session->flashdata('error')) {
        echo $this->session->flashdata('error');
    }
    ?>
    <input type="file" name="userfile" size="20" />
    <input type="submit" value="upload" />
    </form>

    <?php
    if (isset($awsImage) && count($awsImage) > 0) { ?>
        <div>
            S3 Bucket Image List
            <table>
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Output table rows
                    foreach ($awsImage as $key => $value) {
                    ?>
                        <tr>
                            <td> <?php echo $value['Key'] ?> </td>
                            <td><a href="<?= base_url('/AWSBucket/deleteFile?delete=' . $value['Key']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </a>
                                <br>
                                <a href="<?= base_url('/AWSBucket/previewImage?id=' . $value['Key']) ?>" class="btn btn-danger">
                                    <i class="fas fa-eye"></i>
                                    Preview Image
                                </a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
</body>

</html>