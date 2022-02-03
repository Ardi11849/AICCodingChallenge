<?php $this->load->view('template/js');?>
<script>
    tableBonus();
    var numberRenderer = $.fn.dataTable.render.number( ',', '.', 0, 'Rp. '  ).display;
    function tableBonus() {
      loading();
      var nextBonus = null;
      $('#tBonus').DataTable().destroy();
        return table = $('#tBonus').DataTable({
        dom: 'Bfrtip',
        lengthMenu: [
            [ 1, 10, 25, 49 ],
            [ '1 row', '10 rows', '25 rows', '49 rows' ]
        ],
        buttons: [
            {extend: 'excel', footer: true, title: 'Data Bonus'}, 
            {extend: 'pdf', footer: true}, 
            {extend: 'print', footer: true},
            'pageLength',
        ],
        processing: true,
        serverSide: true,
        "pageLength": 10,
        searching: false,
        ajax: {
          url: '<?php echo base_url()?>Dashboard/getBonus',
          type:'POST',
            "error": function (e) {
              console.log(e);
              $("#loading").waitMe("hide");
              if (e == 'error_auth') return e;
              return e;
            },
            "dataSrc": function (d) {
                console.log(d);
                nextBonus = d.next;
                $("#loading").waitMe("hide");
                $("#isiToastSuccess").html('Berhasil mengambil data');
                $("#successToast").toast('show');
                return d.data
            }
        },
        columns: [
          { 
            "data": null,
            "sortable": false,
              render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          { data: 'IdBonus' },
          { data: 'CreatedOn' },
          { data: 'JumlahBayar', render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp ' ) },
          { 
            data: 'Data',
            render: function (data, type, row, meta) {
              return data.length;
            }
          },
          { data: 'CreatedBy' },
          { 
            data: 'IdBonus',
            render: function(data, type, row, meta){
                if (<?php echo $this->session->userdata('role');?> == 1) {
                    return '<button class="btn btn-sm btn-ouline-secondary" onclick="detailBonus('+data+')"><i class="fa fa-list"></i> detail</button> <button class="btn btn-sm btn-outline-warning" onClick="updateBonus('+data+')"><i class="fa fa-pencil"></i> update</button> <button class="btn btn-sm btn-outline-primary" onClick="deleteBonus('+data+')"><i class="fa fa-pencil"></i> delete</button>'
                }else{
                    return '<button class="btn btn-sm btn-ouline-secondary" onclick="detailBonus('+data+')"><i class="fa fa-list"></i> detail</button>'
                }
            }
          }
        ]
      });
    };
    $("#btn-addPembayaranBonus").on('click', function () {
        $("#addPembayaranBonus").modal('show');
    });

    function detailBonus(data) {
          $.ajax({
                type: 'POST',
                url: '<?php echo base_url()?>Dashboard/detailBonus',
                dataType: 'json',
                data: 'IdBonus='+data,
                success: function(result){
                    console.log(result);
                    $("#IdBonus").html("<strong>Bonus Id:</strong> "+data);
                    $("#JumlahBayar").html("<strong>Jumlah Bayar:</strong> "+result[0].JumlahBayar);
                    $("#CreatedBy").html("<strong>Dibuat Oleh:</strong> "+result[0].CreatedBy);
                    $("#CreatedOn").html("<strong>Tanggal Pembuatan:</strong> "+result[0].CreatedOn);
                    var setItem = '';
                    for (var i = 0; i <= result[0].Data.length - 1; i++) {
                        result[0].Data[i]
                        setItem += '<div class="col-md-6"><li class="list-group-item border-0 ps-0 text-sm"><strong>No:</strong> '+(i+1)+'</li>'+
                        '<li class="list-group-item border-0 ps-0 text-sm"><strong>Nama Buruh:</strong> '+result[0].Data[i].nama+'</li>'+
                        '<li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Pembayaran Buruh:</strong> '+result[0].Data[i].pembayaran+'</li>'+
                        '<li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Persentase Bagian:</strong> '+result[0].Data[i].persen+' %</li><br></div>'
                    }
                    $("#listBuruh").html(setItem);
                    $('#detailBuruhModal').modal('show');
                    $("#loading").waitMe("hide");
                }
          })
    }

    function updateBonus(data) {
        loading()
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()?>Dashboard/detailBonus',
            dataType: 'json',
            data: 'IdBonus='+data,
            success: function(result){
                console.log(result);
                $("#updatePembayaranBonus").modal('show');
                var buruh = '';
                $("#jmlPembayaranUpdate").val(result[0].JumlahBayar);
                $("#idBonus").val(result[0].IdBonus);
                for (var i = 0; i <= result[0].Data.length - 1; i++) {
                    buruh += '<div class="row" id="buruh'+i+'"><button class="btn btn-outline closedInput" data-id="buruh'+i+'"><i class="fa fa-close"></i></button><div class="col-md-4"><input type="text" name="namaBuruhUpdate[]" placeholder="Masukan Nama Buruh" data-id='+i+' class="form-control buruh" id="NamaBuruh'+i+'" value="'+result[0].Data[i].nama+'"></div><div class="col-md-4"><input type="text" name="buruhUpdate[]" placeholder="Masukan persentase" data-id='+i+' class="form-control buruh" id="Buruh'+i+'" value="'+result[0].Data[i].persen+'"></div></div>';
                }
                $("#groupBuruhUpdate").html(buruh);
                $("#updatePembayaranBonus").modal('show');
                $("#loading").waitMe("hide");
                aktifClose();
            }
        })
    }

    $("#tambahBuruh").on('click', function () {
        var sum = 0;
        $('.buruh').each(function () {
            sum = parseInt($(this).data('id'))+1;
        });
        var input = '<div class="row" id="buruh'+sum+'"><button class="btn btn-outline closedInput" data-id="buruh'+sum+'"><i class="fa fa-close"></i></button><div class="col-md-4"><input type="text" name="namaBuruh[]" placeholder="Masukan Nama Buruh" data-id='+sum+' class="form-control buruh" id="NamaBuruh'+sum+'"></div><div class="col-md-4"><input type="text" name="buruh[]" placeholder="Masukan persentase" data-id='+sum+' class="form-control buruh" id="Buruh1"></div></div>';
        
        $("#groupBuruh").append(input);
        aktifClose();
    });

    $("#tambahBuruhUpdate").on('click', function () {
        var sum = 0;
        $('.buruhUpdaye').each(function () {
            sum = parseInt($(this).data('id'))+1;
        });
        var input = '<div class="row" id="buruh'+sum+'"><button class="btn btn-outline closedInput" data-id="buruh'+sum+'"><i class="fa fa-close"></i></button><div class="col-md-4"><input type="text" name="namaBuruhUpdate[]" placeholder="Masukan Nama Buruh" data-id='+sum+' class="form-control buruh" id="NamaBuruh'+sum+'"></div><div class="col-md-4"><input type="text" name="buruhUpdate[]" placeholder="Masukan persentase" data-id='+sum+' class="form-control buruh" id="Buruh1"></div></div>';
        
        $("#groupBuruhUpdate").append(input);
        aktifClose();
    });

    function aktifClose() {
        $(".closedInput").on('click', function () {
            $('#'+$(this).data('id')).remove();
        })
    }

    $("#savePembayaran").on('click', function () {
        loading();
        var buruh = $('input[name^=buruh]').map(function(idx, elem) {
            return $(elem).val();
        }).get();
        var namaBuruh = $('input[name^=namaBuruh]').map(function(idx, elem) {
            return $(elem).val();
        }).get();

        console.log(buruh);
        console.log(namaBuruh);
        var persen = 0;
        for (var i = buruh.length - 1; i >= 0; i--) {
            console.log(buruh[i])
            persen += parseFloat(buruh[i].replace(/,/g, "."));
        }
        console.log(parseFloat(persen).toFixed(2))

        if ($("#jmlPembayaran").val() == null || $("#jmlPembayaran").val() == '') {
            $("#isiToastGagal").html('Message: Masukan Jumlah Pembayaran');
            $("#dangerToast").toast('show');
            $("#loading").waitMe("hide");
        }else if (persen !== 100) {
            $("#isiToastGagal").html('Message: Hasil persentase '+persen+' dan tidak 100');
            $("#dangerToast").toast('show');
            $("#loading").waitMe("hide");
            return false;
        }else{
          var uang = {};
          for (var i = buruh.length - 1; i >= 0; i--) {
              console.log(uang)
              uang[i] = (parseFloat(buruh[i].replace(/,/g, "."))/parseFloat(100))*parseInt($("#jmlPembayaran").val());
          }
          var nama = {};
          for (var i = namaBuruh.length - 1; i >= 0; i--) {
              nama[i] = namaBuruh[i]
          }
          console.log(uang);
          console.log((parseFloat(buruh[1].replace(/,/g, "."))/parseFloat(100))*parseInt($("#jmlPembayaran").val()));
          $.ajax({
                type: 'POST',
                url: '<?php echo base_url()?>Dashboard/saveBonus',
                dataType: 'json',
                data: {jmlBayar: $("#jmlPembayaran").val(), pembayaranBuruh: uang, namaBuruh: nama, persenBuruh: buruh},
                success: function(data){
                    console.log(data);
                    tableBonus();
                    $("#isiToastBerhasil").html('Message: Data berhasil di inputkan');
                    $("#successToast").toast('show');
                    $("#addPembayaranBonus").modal('hide');
                    $("#loading").waitMe("hide");
                }
          })
        }
    })

    $("#updatePembayaran").on('click', function () {
        loading();
        var buruh = $('input[name^=buruhUpdate]').map(function(idx, elem) {
            return $(elem).val();
        }).get();
        var namaBuruh = $('input[name^=namaBuruhUpdate]').map(function(idx, elem) {
            return $(elem).val();
        }).get();

        console.log(buruh);
        console.log(namaBuruh);
        var persen = 0;
        for (var i = buruh.length - 1; i >= 0; i--) {
            console.log(buruh[i])
            persen += parseFloat(buruh[i].replace(/,/g, "."));
        }
        console.log(parseFloat(persen).toFixed(2))

        if (buruh.length < 3) {
            $("#isiToastGagal").html('Message: Jumlah buruh minimal 3 orang');
            $("#dangerToast").toast('show');
            $("#loading").waitMe("hide");
        } else if ($("#jmlPembayaranUpdate").val() == null || $("#jmlPembayaranUpdate").val() == '') {
            $("#isiToastGagal").html('Message: Masukan Jumlah Pembayaran');
            $("#dangerToast").toast('show');
            $("#loading").waitMe("hide");
        }else if (persen !== 100) {
            $("#isiToastGagal").html('Message: Hasil persentase '+persen+' dan tidak 100');
            $("#dangerToast").toast('show');
            $("#loading").waitMe("hide");
            return false;
        }else{
          var uang = {};
          for (var i = buruh.length - 1; i >= 0; i--) {
              console.log(uang)
              uang[i] = (parseFloat(buruh[i].replace(/,/g, "."))/parseFloat(100))*parseInt($("#jmlPembayaranUpdate").val());
          }
          var nama = {};
          for (var i = namaBuruh.length - 1; i >= 0; i--) {
              nama[i] = namaBuruh[i]
          }
          console.log(uang);
          console.log((parseFloat(buruh[1].replace(/,/g, "."))/parseFloat(100))*parseInt($("#jmlPembayaranUpdate").val()));
          $.ajax({
                type: 'POST',
                url: '<?php echo base_url()?>Dashboard/updateBonus',
                dataType: 'json',
                data: {idBonus: $("#idBonus").val(), jmlBayar: $("#jmlPembayaranUpdate").val(), pembayaranBuruh: uang, namaBuruh: nama, persenBuruh: buruh},
                success: function(data){
                    console.log(data);
                    tableBonus();
                    $("#isiToastBerhasil").html('Message: Data berhasil di ubah');
                    $("#successToast").toast('show');
                    $("#updatePembayaranBonus").modal('hide');
                    $("#loading").waitMe("hide");
                }
          })
        }
    })

    function deleteBonus(data) {
        if (confirm('Apakah anda yakin ingin menghapus data?')) {
          $.ajax({
                type: 'POST',
                url: '<?php echo base_url()?>Dashboard/deleteBonus',
                dataType: 'json',
                data: {idBonus: data},
                success: function(data){
                    console.log(data);
                    tableBonus();
                    $("#isiToastBerhasil").html('Message: Data berhasil di ubah');
                    $("#successToast").toast('show');
                    $("#updatePembayaranBonus").modal('hide');
                    $("#loading").waitMe("hide");
                }
          })
        } else {
          // Do nothing!
          console.log('Thing was not saved to the database.');
        }
    }

    $("#encrypt").on('click', function() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()?>Dashboard/enc',
            dataType: 'json',
            data: {encrypt: $("#valencrypt").val()},
            success: function(data){
                console.log(data);
                tableBonus();
                $("#isiToastBerhasil").html('Message: Berhasil encrypt text');
                $("#successToast").toast('show');
                $("#hasilEnc").html(data);
                $("#loading").waitMe("hide");
            }
        })
    })
</script>