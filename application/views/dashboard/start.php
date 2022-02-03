<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('template/css'); ?>

<body class="g-sidenav-show  bg-gray-200">
    <?php $this->load->view('template/toast'); ?>
    <?php $this->load->view('template/sidebar');?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div id="loading">
            <?php $this->load->view('dashboard/isi/main'); ?>
        </div>
    </main>
    <?php $this->load->view('template/setting');?>
    <?php $this->load->view('template/js'); ?>
    <?php $this->load->view('dashboard/js/js'); ?>
</body>

</html>