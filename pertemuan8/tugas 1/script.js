document.getElementById('form-cek-umur').addEventListener('submit', function(event) {
    event.preventDefault();  // Mencegah form untuk mengirimkan data

    var nama = document.getElementById('nama').value;
    var umur = parseInt(document.getElementById('umur').value);
    var resultDiv = document.getElementById('result');

    if (nama === '' || isNaN(umur)) {
        resultDiv.textContent = 'Silakan masukkan nama dan umur yang valid.';
        resultDiv.style.color = 'red';
    } else {
        if (umur >= 18) {
            resultDiv.textContent = `Halo, ${nama}! Status: Dewasa`;
            resultDiv.style.color = 'green';
        } else {
            resultDiv.textContent = `Halo, ${nama}! Status: Belum Dewasa`;
            resultDiv.style.color = 'orange';
        }
    }
});
