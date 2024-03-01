<style>
    .image-wrap-2 {
        position: relative;
    }

    .image-info {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 10px; /* Menambahkan padding untuk memisahkan teks dari tepi */
        text-align: center;
    }
    .container-fluid {
        background-color: purple;
    }
</style>

<div class="container-fluid" data-aos="fade" data-aos-delay="500">
    <div class="row">
        <?php foreach ($albums as $album) : ?>
            <div class="col-lg-4">
                <div class="image-wrap-2">
                    <?php if (!empty($album['cover'])) : ?>
                        <img src="<?= base_url('images/' . $album['cover']); ?>" alt="Album Cover" class="img-fluid">
                    <?php else : ?>
                        <img src="<?= base_url('images/default1.jpg'); ?>" alt="Default Image" class="img-fluid">
                    <?php endif; ?>
                    <div class="image-info">
                        <h2 class="mb-3"><?= $album['nama_album']; ?></h2>
                        <a href="<?= base_url('dashboard/viewAlbum/' . $album['id_album']); ?>" class="btn btn-outline-white py-2 px-4">lebih banyak</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>




    <div class="footer py-4">
      <div class="container-fluid text-center">
        <p>

         
        
        </p>
      </div>
    </div>

    

    
    
  </div>