<?php
error_reporting(0);
$kondisi  = $_POST['kondisi'];
$keluaran = $_POST['keluaran'];

if ($kondisi <= 0 || $keluaran <= 0) {
  $l = "";
} else {  
  //Kondisi (satuan = %)
  //Kondisi Sempurna
  if ($kondisi <= 10) {
    $kondisiSempurna = 0;
  } else if ($kondisi > 30 && $kondisi <= 50) {
    $kondisiSempurna = 0;
  } else if ($kondisi > 50 && $kondisi <= 90) {
    $kondisiSempurna = ($kondisi - 50) / (40);
  } else {
    $kondisiSempurna = 1;
  }
  //Kondisi baik
  if ($kondisi <= 30) {
    $kondisiBaik = 0;
  } else if ($kondisi > 30 && $kondisi <= 50) {
    $kondisiBaik = ($kondisi - 30) / (20);
  } else if ($kondisi > 50 && $kondisi < 70) {
    $kondisiBaik = (70 - $kondisi) / (20);
  } else {
    $kondisiBaik = 0;
  }

  //Kondisi Cukup
  if ($kondisi <= 10) {
    $kondisiCukup = 1;
  } else if ($kondisi > 10 && $kondisi < 50) {
    $kondisiCukup = (50 - $kondisi) / (40);
  } else {
    $kondisiCukup = 0;
  }


  //Keluaran (satuan = tahun)
  //Keluaran Baru
  if ($keluaran <= 2019) {
    $keluaranBaru = 0;
  } else if ($keluaran > 2019 && $keluaran <= 2020 ) {
    $keluaranBaru = ($keluaran - 2019) / (2020 - 2019);
  } else {
    $keluaranBaru = 1;
  }


  //Keluaran Lawas
  if ($keluaran <= 2018) {
    $keluaranLawas = 1;
  } else if ($keluaran > 2019 && $keluaran <= 2020) {
    $keluaranLawas = (2020 - $keluaran) / (20);
  } else {
    $keluaranLawas = 0;
  }

  $l1 = 0;
  $l2 = 0;
  $l3 = 0;
  $l4 = 0;
  $l5 = 0;
  $l6 = 0;

  $R1 = min($kondisiCukup, $keluaranLawas); //maka tidak Layak
  $l1 = 60 - (30 * $R1);

  $R2 = min($kondisiCukup, $keluaranBaru); //maka tidak Layak
  $l2 = 60 - (30 * $R2);

  $R3 = min($kondisiBaik, $keluaranLawas); //maka tidak Layak
  $l3 = 60 - (30 * $R3);

  $R4 = min($kondisiBaik, $keluaranBaru); //maka Layak
  $l4 = 30 + $R4 * 30;

  $R5 = min($kondisiSempurna, $keluaranLawas); //maka Layak
  $l5 = 30 + $R5 * 30;

  $R6 = min($kondisiSempurna, $keluaranBaru); //maka Layak
  $l6 = 30 + $R6 * 30;

  $total_RiZi = ($R1 * $l1) + ($R2 * $l2) + ($R3 * $l3) + ($R4 * $l4) + ($R5 * $l5) + ($R6 * $l6);
  $total_R = $R1 + $R2 + $R3 + $R4 + $R5 + $R6;
  $l = $total_RiZi / $total_R;

  $kelayakan = $l;
  if ($kelayakan <= 30) {
    $Layak = 0;
  } else if ($kelayakan > 30 && $kelayakan <= 60) {
    $Layak = ($kelayakan - 30) / (60 - 30);
  } else {
    $Layak = 1;
  }

  if ($kelayakan <= 30) {
    $tidakLayak = 1;
  } else if ($kelayakan > 30 && $kelayakan <= 60) {
    $tidakLayak = (60 - $kelayakan) / (60 - 30);
  } else {
    $tidakLayak = 0;
  }
}
