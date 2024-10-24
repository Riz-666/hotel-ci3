<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('_template/header.php'); ?>
</head>

<body class="lead">
    <div>
        <?php $this->load->view('_template/navbar.php'); ?>
        <div class="container" style="margin: 1em auto;">
            <h1>Kamar</h1>
            <?php if ($total_kamar > 0) : ?>
                 <?php foreach ($rooms as $room) : ?>
                    <div class="container border show">
                        <div class="p-2 m-4">
                            <div class="col  text-center">
                                <img src="<?= empty($room->image) ? base_url('assets/img/no-image.png')  : base_url('upload/rooms/' . $room->image) ?>" height="300px" width="500px">
                                <hr />

                                   <div class="col">
                                <h3><?= html_escape($room->tipe_kamar) ?></h3>
                                <div id="fasilitas" class="small"><?= $room->fasilitas_kamar ?></div>
                            </div>
                            <small>starting from</small>
                                <h5>=
                                    <label class="text-warning">IDR <?= html_escape($room->harga_sewa) ?> </label>
                                    <small>/ room / night</small>
                                </h5>
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