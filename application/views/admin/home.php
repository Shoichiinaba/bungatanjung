
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Halaman Awal</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <section class="content">
        <div class="callout callout-info">
            <div class="col-sm-12">
                <div class="position-relative p-2 col-sm-12 bg-gray" style="height: 195px ">
                  <div class="ribbon-wrapper ribbon-xl">
                    <div class="ribbon bg-warning text-lg">
                      E- <i style= 'color: red'>Upload</i><i style= 'color: blue'> Data</i>
                    </div>
                  </div>
                  <center><h4>Selamat Datang <b>" <i><?php echo $userdata->nama; ?> " </i></b>Anda Sudah Login Di Sistem Upload Data Transaksi</i><i style= 'color: blue'></i></h4></center>
                  <center <p>.Sistem ini berfungsi untuk upload data dan membandingkan data<i style= 'color: Blue'><u> Deposit</i> <i style= 'color: yellow'> & Transaksi </u></i> </p></center>
                </div>
            </div>
        </div>
        <!-- information -->
         <div class="row">
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="row">
                <div class="col-lg-6 col-6">
                  <div class="inner p-2">
                    <h4><?php echo $dep_up; ?> Data</h4>
                    <br>
                    <p>Data Deposit</p>
                  </div>
                </div>
                <div class="col-lg-6 col-6">
                  <div class="inner p-2">
                    <h4><?php echo $trx_up; ?> Data</h4>
                    <br>
                    <p>Data Transaksi</p>
                  </div>
                </div>
              </diV>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Total Data Terupload </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $jml_trx_deposit; ?> Data</h3>
                <p>Status Berhasil Transaksi & Deposit Ada</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3><?php echo $jml_depos_no; ?> Data</sup></h3>
                <p>Deposit Belum Masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
           <div class="col-lg-3 col-6">
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo $jml_toko;  ?> Toko</h3>

                <p>Jumlah Toko</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </section>
</div>
<div>
