<style>
        body {
            display: rectangle;
            align-items: middle;
            justify-content: center;
            height: 50vh;
            margin: 5;
        }

}
form *{
    font-family: 'Poppins',times news roman;
    color: #00FFFF;
    letter-spacing: 0.5px;
    outline: 15;
    border: 7;
}

        img {
            max-width: 50px; /* Set maximum width for the profile picture */
        }
    </style>
</head>
<body>
    <!-- Tampilkan formulir edit profil -->
    <form action="<?= base_url('acc/updateProfile'); ?>" method="post" enctype="multipart/form-data">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?= $userData['nama']; ?>" required>

        <label for="username">Username:</label>
        <input type="text" name="username" value="<?= $userData['username']; ?>" required>

        <!-- Tampilkan Foto Profil Lama -->
        <?php if (!empty($userData['foto'])) : ?>
            <img src="<?= base_url('images/' . $userData['foto']); ?>" alt="Profile Picture" class="img-fluid">
        <?php else : ?>
            <p>No profile picture available.</p>
        <?php endif; ?>

        <!-- Edit Foto Profil -->
        <label for="foto">Foto Profil Baru:</label>
        <input type="file" name="foto">

        <!-- Tombol Update -->
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
