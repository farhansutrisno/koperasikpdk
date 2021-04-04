<?php
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=Data_Produk.xls");
 header("Pragma: no-cache");
 header("Expires: 0");
 ?>

<table border="1">
                        <tr>
                              <th rowspan="1">KD PRODUK</th>
                              <th rowspan="1">NAMA SUPLIER</th>
                              <th rowspan="1">NAMA PRODUK</th>
                              <th rowspan="1">BERAT</th>
                              <th rowspan="1">HARGA PENJUALAN</th>
                              <th rowspan="1">HARGA POKOK PEMBELIAN</th>
                              <th rowspan="1">STOK</th>
                              <th rowspan="1">DESKRIPSI</th>
                              <th rowspan="1">KATEGORI</th>
                              <th rowspan="1">TANGGAL PEMBELIAN</th>
                              <th rowspan="1">EXPIRED</th>
                              <th rowspan="1">KD OPERATOR</th>
                            </tr>
                            
                            <tbody>
                                <?php foreach ($produk as $r) {
                            echo "<tr>
                                  <td>".  ($r->kdProduk)."</td>
                                  <td>".  ($r->namaSuplier)."</td>
                                  <td>".  ($r->namaProduk)."</td>
                                  <td>".  ($r->berat)."</td>
                                  <td>".  ($r->hargaPenjualan)."</td>
                                  <td>".  ($r->hargaPokokPembelian)."</td>
                                  <td>".  ($r->stok)."</td>
                                  <td>".  ($r->deskripsi)."</td>
                                  <td>".  ($r->kategori)."</td>
                                  <td>".  ($r->tglPembelian)."</td>
                                  <td>".  ($r->expired)."</td>
                                  <td>".  ($r->kdOperator)."</td>
                                  </tr>";
                                } ?>
                            </tbody>    
                </table>
