@extends('layouts.template')
@section('title', 'User Management')
@section('pages', 'Formulir Tambah User')
@section('User Management', 'active')
@section('container')

    <div class="app-wrapper">
            <div class="app-content pt-3 p-md-3 p-lg-4">
            <!-- Pills content -->

                <div class="container-xl">
                    <form style="margin: 10px 30px;" action="/role" method="POST">
                        @csrf

                        <!-- Name input -->
                        <div class="mb-3">
                            <label for="nama_user">Nama User</label>
                            <input type="text" class="form-control @error('nama_user') is invalid @enderror" id="nama_user" name="nama_user" placeholder="Nama User" required value="{{ old('nama_user') }}">
                            <script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
                            <script>
                                @if ($errors->has('nama_user'))
                                Swal.fire({
                                    title: 'Error',
                                    icon: 'error',
                                    text: 'Terdapat isian yang tidak sesuai ketentuan!'
                                });
                                @endif
                            </script>
                            @error('nama_user')
                            <div class="ivalid-feedback" style="color:red; font-size:13px; font-weight:bold">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <input type="hidden" class="form-control" id="slug_user" name="slug_user">
                        </div>

                        <!-- Email input -->
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is invalid
                            @enderror" id="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                            <script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
                            <script>
                                @if ($errors->has('email'))
                                Swal.fire({
                                    title: 'Error',
                                    icon: 'error',
                                    text: 'Terdapat isian yang tidak sesuai ketentuan!'
                                });
                                @endif
                            </script>
                            @error('email')
                            <div class="ivalid-feedback" style="color:red; font-size:13px; font-weight:bold">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Role input -->
                        <div class="mb-3">
                            <label for="role_id" class="form-label">Role</label>
                            <select class="form-select  @error('role_id') is invalid @enderror" id="role_id" name="role_id"
                                aria-label="Pilih Role" required value="{{ old('role_id') }}">
                                <option selected disabled>Pilih Role User</option>
                                @foreach ($role as $role)
                                <option value="{{ $role->id }}">{{ $role->nama_role }}</option>
                                @endforeach
                            </select>
                            <script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
                            <script>
                                @if ($errors->has('role_id'))
                                Swal.fire({
                                    title: 'Error',
                                    icon: 'error',
                                    text: 'Terdapat isian yang tidak sesuai ketentuan!'
                                });
                                @endif
                            </script>
                            @error('role_id')
                            <div class="ivalid-feedback" style="color:red; font-size:13px; font-weight:bold">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Area Perubahan input -->
                        <div class="mb-3">
                            <label for="area_id" class="form-label">Area Perubahan</label>
                            <select class="form-select  @error('area_id') is invalid @enderror" id="area_id" name="area_id"
                                aria-label="Pilih Area Perubahan" required value="{{ old('area_id') }}">
                                <option selected disabled>Pilih Area Perubahan</option>
                                @foreach ($area as $area)
                                <option value="{{ $area->id }}">{{ $area->nama_area }}</option>
                                @endforeach
                            </select>
                            <script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
                            <script>
                                @if ($errors->has('area_id'))
                                Swal.fire({
                                    title: 'Error',
                                    icon: 'error',
                                    text: 'Terdapat isian yang tidak sesuai ketentuan!'
                                });
                                @endif
                            </script>
                            @error('area_id')
                            <div class="ivalid-feedback" style="color:red; font-size:13px; font-weight:bold">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Provinsi input -->
                        <div class="mb-3">
                            <label for="provinsi_id" class="form-label">Provinsi</label>
                            <select class="form-select  @error('provinsi_id') is invalid @enderror" id="provinsi_id" name="provinsi_id"
                                aria-label="Pilih Provinsi" required value="{{ old('provinsi') }}">
                                <option selected disabled>Pilih Provinsi User</option>
                                @foreach ($provinsi as $provinsi)
                                <option value="{{ $provinsi->id }}">{{ $provinsi->nama_provinsi }}</option>
                                @endforeach
                            </select>
                            <script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
                            <script>
                                @if ($errors->has('provinsi_id'))
                                Swal.fire({
                                    title: 'Error',
                                    icon: 'error',
                                    text: 'Terdapat isian yang tidak sesuai ketentuan!'
                                });
                                @endif
                            </script>
                            @error('provinsi_id')
                            <div class="ivalid-feedback" style="color:red; font-size:13px; font-weight:bold">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Wilayah input -->
                        <div class="mb-3">
                            <label for="kabkota_id" class="form-label">Kabupaten/Kota</label>
                            <select class="form-select  @error('kabkota_id') is invalid @enderror" id="kabkota_id" name="kabkota_id"
                                aria-label="Pilih KabKota" required value="{{ old('kabkota_id') }}">
                                <option selected disabled>Pilih Kabupaten/Kota User</option>
                                @foreach ($kabkota as $kabkota)
                                    <option value="{{ $kabkota->id }}">{{ $kabkota->nama_kabkota }}</option>
                                @endforeach
                            </select>
                            <script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
                            <script>
                                @if ($errors->has('kabkota_id'))
                                Swal.fire({
                                    title: 'Error',
                                    icon: 'error',
                                    text: 'Terdapat isian yang tidak sesuai ketentuan!'
                                });
                                @endif
                            </script>
                            @error('kabkota_id')
                            <div class="ivalid-feedback" style="color:red; font-size:13px; font-weight:bold">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <script src="{{ url('/assets/js/sweetalert2.all.min.js') }}"></script>
                            <script>
                                @if ($errors->has('password'))
                                Swal.fire({
                                    title: 'Error',
                                    icon: 'error',
                                    text: 'Terdapat isian yang tidak sesuai ketentuan!'
                                });
                                @endif
                            </script>
                            @error('password')
                            <div class="ivalid-feedback" style="color:red; font-size:13px; font-weight:bold">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Submit button -->
                        <div class="d-flex flex-row-reverse">
                            <input type="submit" name="submit" value="Tambah User" class="btn btn-primary" style="width: 200px; margin: 20px 0;">
                        </div>
                    </form>
                </div>
            </div>
    </div>



<script>
    const nama = document.querySelector('#nama_user');
    const slug = document.querySelector('#slug_user');

    nama.addEventListener('change', function() {
        fetch('/role/checkSlug?nama=' + nama.value).then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>

<script type="text/javascript">
    $(function()
    {
        $('#area_id').hide();
        $('label[for="area_id"]').hide();
        $('#provinsi_id').hide();
        $('label[for="provinsi_id"]').hide();
        $('#kabkota_id').hide();
        $('label[for="kabkota_id"]').hide();
        $('#role_id').change(function(){
            if($('#role_id').val() == 1)
            {
                $('#area_id').show();
                $('label[for="area_id"]').show();
                $('#provinsi_id').hide();
                $('label[for="provinsi_id"]').hide();
                $('#kabkota_id').hide();
                $('label[for="kabkota_id"]').hide();
            }
            else if($('#role_id').val() == 2)
            {
                $('#provinsi_id').show();
                $('label[for="provinsi_id"]').show();
                $('#area_id').hide();
                $('label[for="area_id"]').hide();
                $('#kabkota_id').hide();
                $('#kabkota_id').val();
                $('label[for="kabkota_id"]').hide();
            }
            else if($('#role_id').val() == 3)
            {
                $('#provinsi_id').show();
                $('label[for="provinsi_id"]').show();
                $('#kabkota_id').show();
                $('label[for="kabkota_id"]').show();
                $('#area_id').hide();
                $('label[for="area_id"]').hide();
            }
            else if($('#role_id').val() == 4)
            {
                $('#provinsi_id').hide();
                $('label[for="provinsi_id"]').hide();
                $('#kabkota_id').hide();
                $('label[for="kabkota_id"]').hide();
                $('#area_id').hide();
                $('label[for="area_id"]').hide();
            }
        });
    });
</script>

<script>
$(document).ready(function(){
//provinsi on change
       $('#provinsi_id').change(function (e) {
           $.ajax({
               url: "<?= url('/admin/get-kota-kab/') ?>/" + $(this).val(),
               method: 'GET',
               success: function (data) {
                   //console.log(data);

                   $('#kota').children('option:not(:first)').remove().end();

                   $.each(data, function (index, kotaObj) {
                       $('#kota').append('<option value="' + kotaObj.id + '"> ' +
                           kotaObj.type + ' ' +
                           kotaObj.name + ' </option>')
                   });
               }
           });
       });
});

@endsection
