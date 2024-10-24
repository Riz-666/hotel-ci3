     <!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('_template/header.php'); ?>
    <style type="text/css">
        h1{
            text-align: center;
            text-shadow: 0 0 8px #000000;
        }
    </style>
</head>
<body class="lead">
    <div>
        <?php $this->load->view('_template/navbar.php'); ?>
        <div class="container" style="margin: 1em auto;">
            <h1>Fasilitas</h1>
            <?php if ($total_facility > 0) : ?>
                 <?php foreach ($facilities as $data) : ?>
                    <div class="container border show">
                        <div class="p-2 m-4">
                            <div class="col  text-center">
                                <img src="<?= empty($data->image) ? base_url('assets/img/no-image.png')  : base_url('upload/facilities/' . $data->image) ?>" height="300px" width="500px">
                                <hr />

                                   <div class="col">
                                <h3><?= html_escape($data->nama_fasilitas) ?></h3>
                                <div id="fasilitas" class="small"><?= $data->keterangan ?></div>
                            </div>
                            </div>
                         
                        </div>
                    </div>
                    <br />
                <?php endforeach ?>
            <?php else : ?>
                <div class="container border shadow-sm">
                    No room available!
                </div>
            <?php endif ?>
        </div>
    </div>
    <?php $this->load->view('_template/footer.php'); ?>
</body>

</html>