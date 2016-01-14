<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Customer
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box box-solid box-info">
            <div class="box-header">
              <h3 class="box-title">Detail Customer</h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <td><strong>Nama</strong></td>
                  <td><strong>:</strong></td>
                  <td><?=$customer->customer_nama ?></td>
                </tr>
                <tr>
                  <td><strong>User Name</strong></td>
                  <td><strong>:</strong></td>
                  <td><?=$customer->customer_username ?></td>
                </tr>
                <tr>
                  <td><strong>Telefon</strong></td>
                  <td><strong>:</strong></td>
                  <td><?=$customer->customer_telefon ?></td>
                </tr>
                <tr>
                  <td><strong>Email</strong></td>
                  <td><strong>:</strong></td>
                  <td><?=$customer->customer_email ?></td>
                </tr>
                <tr>
                  <td><strong>Alamat</strong></td>
                  <td><strong>:</strong></td>
                  <td><?=$customer->customer_alamat ?></td>
                </tr>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

  