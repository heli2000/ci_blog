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
                                <a href="<?= base_url('/blog/edit/' . $value->blog_id) ?>" class="btn btn-primary"> <i
                                        class="fas fa-edit"></i>
                                    Edit </a>
                                <a href="<?= base_url('/blog/delete/' . $value->blog_id) ?>" class="btn btn-danger"
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
        <?php 
        $prefs['template'] = '

        {table_open}<table border="0" cellpadding="0" cellspacing="0">{/table_open}

        {heading_row_start}<tr>{/heading_row_start}

        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

        {heading_row_end}</tr>{/heading_row_end}

        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr>{/cal_row_start}
        {cal_cell_start}<td>{/cal_cell_start}
        {cal_cell_start_today}<td>{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

        {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
        {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

        {cal_cell_no_content}{day}{/cal_cell_no_content}
        {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_other}{day}{/cal_cel_other}

        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}
';

    $this->load->library('calendar', $prefs);
        echo $this->calendar->generate(); 
        
        $this->load->library('email');

$this->email->from('your@example.com', 'Your Name');
$this->email->to('heli.t@covrize.com');
// $this->email->cc('another@another-example.com');
// $this->email->bcc('them@their-example.com');

$this->email->subject('Email Test');
$this->email->message('Testing the email class.');

$this->email->send();
        
        ?>
    </div>
    <?php $this->load->view('./includes/footer'); ?>
</body>

</html>