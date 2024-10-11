<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
</head>
<body>
    <h1>Library System Management</h1>
    <form method="POST">
        <label for="bookCount">Masukkan Jumlah Buku yang Ingin dibuat (1-100):</label><br>
        <input type="number" id="bookCount" name="bookCount" min="1" max="100" required><br><br>
        
        <div id="bookInputContainer">
            <!-- Input fields untuk detail buku akan muncul di sini -->
        </div>
        
        <button type="button" onclick="generateInputFields()">Lengkapi Detail Buku</button><br><br>
        <input type="submit" value="Buat Buku">
    </form>

    <script>
        function generateInputFields() {
            const bookCount = document.getElementById('bookCount').value;
            const container = document.getElementById('bookInputContainer');
            container.innerHTML = ''; // Hapus input sebelumnya

            for (let i = 1; i <= bookCount; i++) {
                container.innerHTML += `
                    <h3>Detail Buku ke-${i}:</h3>
                    <label>Jenis Buku:</label>
                    <select name="bookType[]" required>
                        <option value="ebook">EBook</option>
                        <option value="printedbook">Printed Book</option>
                    </select><br>

                    <label>Judul:</label>
                    <input type="text" name="title[]" required><br>

                    <label>Penulis:</label>
                    <input type="text" name="author[]" required><br>

                    <label>Tahun Terbit:</label>
                    <input type="number" name="publicationYear[]" required><br>

                    <label>Ukuran File (untuk EBook) / Jumlah Halaman (untuk Printed Book):</label>
                    <input type="number" name="additionalInfo[]" required><br><br>
                `;
            }
        }
    </script>
</body>
</html>

<?php

// Include file class Book, EBook, PrintedBook
include 'library.php'; // Pastikan nama file class sesuai

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bookCount = (int) $_POST['bookCount'];
    $bookTypes = $_POST['bookType'];
    $titles = $_POST['title'];
    $authors = $_POST['author'];
    $publicationYears = $_POST['publicationYear'];
    $additionalInfos = $_POST['additionalInfo'];

    $books = [];

    for ($i = 0; $i < $bookCount; $i++) {
        $type = $bookTypes[$i];
        $title = $titles[$i];
        $author = $authors[$i];
        $publicationYear = (int)$publicationYears[$i];
        $additionalInfo = (int)$additionalInfos[$i];

        if ($type === 'ebook') {
            $books[] = new EBook($title, $author, $publicationYear, $additionalInfo);
        } elseif ($type === 'printedbook') {
            $books[] = new PrintedBook($title, $author, $publicationYear, $additionalInfo);
        }
    }

    // Tampilkan detail buku yang telah dibuat
    echo "<h2>Detail Buku yang telah dibuat:</h2>";
    foreach ($books as $book) {
        echo $book->getDetails() . "<br><br>";
    }
}
?>
