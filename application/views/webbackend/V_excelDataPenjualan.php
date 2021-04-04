<?php
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=Data_Penjualan.xls");
 header("Pragma: no-cache");
 header("Expires: 0");
 ?>

<table border="1">
                        <tr>
                              <th rowspan="1">KD PEMBELIAN</th>
                              <th rowspan="1">ID AKUN</th>
                              <th rowspan="1">KURIR</th>
                              <th rowspan="1">BIAYA KIRIM</th>
                              <th rowspan="1">TOTAL BAYAR</th>
                              <th rowspan="1">KD PRODUK</th>
                              <th rowspan="1">JUMLAH PRODUK</th>
                              <th rowspan="1">SUBTOTAL</th>
                              <th rowspan="1">KD PEMBAYARAN</th>
                              <th rowspan="1">TANGGAL TRANSAKSI</th>
                              <th rowspan="1">TANGGAL PEMBAYARAN</th>
                              <th rowspan="1">NO RESI</th>
                              <th rowspan="1">STATUS PEMBAYARAN</th>
                              <th rowspan="1">KODE UNIK</th>
                              <th rowspan="1">KD OPERATOR</th>
                            </tr>
                            
                            <tbody>
                                <?php foreach ($penjualan as $r) {
                            echo "<tr>
                                  <td>".  ($r->kdPembelian)."</td>
                                  <td>".  ($r->idAkun)."</td>
                                  <td>".  ($r->kurir)."</td>
                                  <td>".  ($r->biayaKirim)."</td>
                                  <td>".  ($r->totalBayar)."</td>
                                  <td>".  ($r->kdProduk)."</td>
                                  <td>".  ($r->jml_produk)."</td>
                                  <td>".  ($r->subtotal)."</td>
                                  <td>".  ($r->kdPembayaran)."</td>
                                  <td>".  ($r->tglTransaksi)."</td>
                                  <td>".  ($r->tglPembayaran)."</td>
                                  <td>".  ($r->noResi)."</td>
                                  <td>".  ($r->statusPembayaran)."</td>
                                  <td>".  ($r->kodeUnik)."</td>
                                  <td>".  ($r->kdOperator)."</td>
                                  </tr>";
                                } ?>
                            </tbody>    
                </table>
