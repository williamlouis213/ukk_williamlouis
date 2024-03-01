<!-- delete_confirmation.php -->
<div class="container">
    <h2>ingin melanjutkan menghapus?</h2>
    <p>anda yakin?</p>

    <form action="<?= base_url('/post/confirmDelete/' . $post->id_post); ?>" method="post">
        <button type="submit">Yes, Delete</button>
        <a href="<?= base_url('/dashboard/viewAlbum/' . $post->album_id); ?>">tidak, tidak jadi</a>
    </form>
</div>
