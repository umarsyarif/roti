<div class="row">
  	<div class="col-lg-12">
    	<div class="box box-success">
    		<div class="box-header">
              	<h3 class="box-title">Laporan Penjualan</h3>
            </div>
      		<div class="box-body">
      			<form role="form" method="post" enctype="multipart/form-data" id="form">
                    <div class="col-lg-12">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Kategori Tanggal</label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-default pull-right form-control" id="daterange-btn">
                                        <span>
                                            <i class="fa fa-calendar"></i> Pilih Kategori Tanggal
                                        </span>
                                        <i class="fa fa-caret-down"></i>
                                        <input type="hidden" name="kategori" id="kategori">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-info" id="btnprosess">Lihat</button>
                        </div>
                    </div>
                </form>
      		</div>
            <div class="box-body">
                <center><img src="<?= base_url() ?>asset/loader.gif" style=" width: 40px;" id="loading1"></center>
                <div id="tampil"></div>
            </div>
  		</div>
	</div>
</div>

<script>
  $(function () {
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('D-MM-YYYY') + ' s/d ' + end.format('D-MM-YYYY'));
          $('#kategori').val(start.format('D-MM-YYYY') + ' s/d ' + end.format('D-MM-YYYY'));
        }
    );
  });
$('#loading1').hide();
$('#form').on("submit", function(event){
    event.preventDefault();
    $('#btnprosess').attr('disabled',true); //set button disable 
    $('#tampil').html('');
    $('#loading1').show();
    $.ajax({
        url: "<?php echo site_url('admin/lpenjualan/tampil')?>",
        method:"POST",
        data:$('#form').serialize(),
        success:function(data){
            $('#loading1').hide();
            $('#tampil').html(data);
            $('#btnprosess').attr('disabled',false); //set button enable 
        },
        error: function (jqXHR, textStatus, errorThrown){
            $('#btnprosess').attr('disabled',false); //set button enable 
        }
    });
});
</script>