<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Notifikasi Darurat dengan Lokasi Otomatis</title>
</head>

<body>
    <h1>Kirim Notifikasi Darurat dengan Lokasi</h1>
    <button id="sendBtn">Kirim Notifikasi</button>

    <script>
        document.getElementById('sendBtn').addEventListener('click', function() {
            // Meminta izin dan mendapatkan lokasi pengguna
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    // Mendapatkan latitude dan longitude
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    // Membuat URL Google Maps untuk lokasi
                    var mapUrl = "https://www.google.com/maps?q=" + latitude + "," + longitude;

                    // Membuat pesan darurat dengan lokasi
                    var message = "Ini adalah pesan darurat! Lokasi saya saat ini: " + mapUrl;

                    // Nomor WhatsApp penerima
                    var number = "+6285767973635"; // Ganti dengan nomor tujuan

                    // Membuat link WhatsApp dengan pesan lokasi
                    var whatsappUrl = "https://wa.me/" + number + "?text=" + encodeURIComponent(message);

                    // Redirect ke WhatsApp
                    window.location.href = whatsappUrl;
                }, function(error) {
                    // Menangani error jika lokasi tidak bisa diakses
                    if (error.code === error.PERMISSION_DENIED) {
                        alert("Izin lokasi ditolak. Silakan beri izin untuk melanjutkan.");
                    } else if (error.code === error.POSITION_UNAVAILABLE) {
                        alert("Lokasi tidak dapat ditemukan.");
                    } else if (error.code === error.TIMEOUT) {
                        alert("Permintaan lokasi timeout.");
                    } else {
                        alert("Terjadi kesalahan tak terduga.");
                    }
                });
            } else {
                alert("Geolocation tidak didukung oleh browser Anda.");
            }
        });
    </script>
</body>

</html>