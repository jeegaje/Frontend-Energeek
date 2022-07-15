
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Energeek</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminLTE/') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminLTE/') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('adminLTE/') }}/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('adminLTE/') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('adminLTE/') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('adminLTE/') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('adminLTE/') }}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{ asset('adminLTE/') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ asset('adminLTE/') }}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{ asset('adminLTE/') }}/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{ asset('adminLTE/') }}/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminLTE/') }}/dist/css/adminlte.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminLTE/') }}/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="style.css">

  
</head>
<body>
<div class="bg-light">
    <div class="container py-5">
<div>
<img class="d-block mx-auto mb-5" src="images/logo.png" alt="">
<div class="card mx-auto py-5" style="max-width: 450px;">
    <h3 class="text-center">Apply Lamaran</h3>
    <div class="card-body">
        <form id="formLamar">
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <select class="form-control select2" id="jabatan" style="width: 100%;">
                <option disabled selected hidden>Pilih Jabatan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="telepon">Telepon</label>
            <div class="input-group">
            <input type="text" class="form-control" id="telepon" placeholder="Cth: 0893239851289">
                <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <div class="input-group">
                <input type="email" class="form-control" id="email" placeholder="Cth: energeekmail@gmail.com">
                <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="tahunLahir">Tahun Lahir</label>
            <div class="input-group">
                <input type="text" class="form-control" id="tahunLahir" placeholder="Cth: 1998">
                <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="skillSet">Skill Set</label>
            <label>Multiple</label>
                  <select id="skillSet" class="select2" multiple="multiple" data-placeholder="Pilih Skill" style="width: 100%;">
                  </select>
            </div>
        </div>
        <button id="applyButton" type="submit" class="btn btn-danger mx-3 mb-3">Apply</button>
        </form>
    </div>
</div>
</div>
</div>

<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- jQuery -->
<script src="{{ asset('adminLTE/') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminLTE/') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminLTE/') }}/dist/js/adminlte.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('adminLTE/') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('adminLTE/') }}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminLTE/') }}/dist/js/adminlte.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    
    $.get("http://demo73.energeek.co.id/energeek-frontend-test/public/api/select_list/job?search", function(data, status){
            let jobs = data.data.jobs;
            
            for (let x in jobs){
                let job = $("<option value='" + jobs[x].id + "'></option>").text(jobs[x].name);   // Create with jQuery
                $("#jabatan").append(job);      // Append the new elements
            }
    });
    $.get("http://demo73.energeek.co.id/energeek-frontend-test/public/api/select_list/skill?search", function(data, status){
            let skills = data.data.skills;
            for (let x in skills){
                let skill = $("<option value='" + skills[x].id + "'></option>").text(skills[x].name);   // Create with jQuery
                $("#skillSet").append(skill);      // Append the new elements
            }
    });
    
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()
   
    $('#applyButton').click(function(){
        if ($('#jabatan').val() == "" || $('#telepon').val() == "" || $('#email').val() == "" || $('#tahunLahir').val() == "" || $('#skillSet').val() == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Terjadi Kesalahan',
                text: 'Harap isi semua field',
            });
        } else {
            Swal.fire({
                title: 'Berhasil!',
                text: 'Lamaran Berhasil Dikirim.',
                icon: 'success',
                confirmButtonText: 'Selesai',
                confirmButtonColor: '#1BC5BD'
            });
        }
    });
});
</script>
</body>
</html>
