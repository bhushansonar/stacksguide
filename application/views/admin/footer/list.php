<div class="container top">

    <ul class="breadcrumb">
        <li>
            <a href="<?php echo site_url("admin/dashboard"); ?>">
                <?php echo ucfirst($this->uri->segment(1)); ?>
            </a>
            <span class="divider">/</span>
        </li>
        <li class="active">
            Footer<?php //echo ucfirst($this->uri->segment(2));           ?>
        </li>
    </ul>

    <div class="page-header users-header">
        <h2>
            Footer<?php //echo ucfirst($this->uri->segment(2));           ?>
            <a  href="<?php echo site_url("admin") . '/' . $this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>
        </h2>
    </div>
    <?php
    //\\print_r($this->session->userdata('flash_message'));
    //print_r($this->session->flashdata('data'));
    //flash messages

    echo validation_errors();
    //echo $this->session->flashdata('flash_message');
    if ($this->session->flashdata('flash_message')) {
        if ($this->session->flashdata('flash_message') == 'add') {
            echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">&#215;</a>';
            echo '<strong>Well done!</strong> new Footer created with success.';
            echo '</div>';
        } else if ($this->session->flashdata('flash_message') == 'update') {
            echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">&#215;</a>';
            echo '<strong>Well done!</strong> Footer updated with success.';
            echo '</div>';
        } else if ($this->session->flashdata('flash_message') == 'delete') {
            echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">&#215;</a>';
            echo '<strong>Well done!</strong> Footer deleted with success.';
            echo '</div>';
        } else {
            echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">&#215;</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
            echo '</div>';
        }
    }
    ?>
    <div class="row">
        <div class="span12 columns">
            <div class="well">

                <?php
                $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');

//save the columns names in a array that we will use as filter
                $options_footer = array();
                foreach ($footer as $array) {
                    foreach ($array as $key => $value) {
                        $options_footer[$key] = $key;
                    }
                    break;
                }

                echo form_open('admin/footer', $attributes);

                echo form_label('Search:', 'search_string');
                echo form_input('search_string', $search_string_selected);
                ?>
                <select name="order" class="span2">
                    <option <?php echo ($order == 'title') ? 'selected="selected"' : "" ?>  value="title">Title</option>
                    <option <?php echo ($order == 'status') ? 'selected="selected"' : "" ?> value="status">Status</option>
                </select>
                <?php
                echo form_label('Order by:', 'order');
//echo form_dropdown('order', $options_footer, $order, 'class="span2"');

                $data_submit = array('name' => 'mysubmit', 'class' => 'btn btn-primary', 'value' => 'Go');

                $options_order_type = array('Asc' => 'Asc', 'Desc' => 'Desc');
                echo form_dropdown('order_type', $options_order_type, $order_type_selected, 'class="span1"');

                echo form_submit($data_submit);
                if ($search_string_selected) {
                    echo '<a style="margin-left: 12px;vertical-align: middle;" class="btn" href="' . site_url("admin/footer/") . '">Reset</a>';
                }
                echo form_close();
                ?>

            </div>

            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th class="header">#</th>
                        <th class="yellow header headerSortDown">Title</th>
                        <th class="yellow header headerSortDown">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($footer as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['footer_id'] . '</td>';
                        echo '<td>' . $row['title'] . '</td>';
                        echo '<td>' . $row['status'] . '</td>';
                        //html_entity_decode($row['en'])
                        echo '<td class="crud-actions">
                  <a  href="' . site_url("admin") . '/footer/update/' . $row['footer_id'] . '" class="btn btn-info">view & edit</a>
                  <a href="' . site_url("admin") . '/footer/delete/' . $row['footer_id'] . '" class="btn btn-danger complexConfirm">delete</a>
                </td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>

            <?php
            $this->session->set_userdata('redirect_url', current_url());
            echo '<div class="pagination">' . $this->pagination->create_links() . '</div>';
            ?>

        </div>
    </div>