<?php
function generateTransactions() {
    // Sample data for transactions
    $transactions = [
        ['Layanan' => 'Service A', 'Nama' => 'John Doe', 'Pembayaran' => 'Paid', 'Status' => 'Completed'],
        ['Layanan' => 'Service B', 'Nama' => 'Jane Smith', 'Pembayaran' => 'Pending', 'Status' => 'Pending'],
        ['Layanan' => 'Service C', 'Nama' => 'Alice Johnson', 'Pembayaran' => 'Paid', 'Status' => 'Completed'],
    ];
    
    foreach ($transactions as $transaction) {
        // Generate a 6-digit random integer
        $nomorPesanan = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        echo "<tr>
                <td>{$nomorPesanan}</td>
                <td>{$transaction['Layanan']}</td>
                <td>{$transaction['Nama']}</td>
                <td>{$transaction['Pembayaran']}</td>
                <td>{$transaction['Status']}</td>
              </tr>";
    }
}
?>
