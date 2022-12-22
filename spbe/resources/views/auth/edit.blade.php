@extends('layouts.template')
@section('title', 'User Management')
@section('pages', 'User Management')
@section('User Management', 'active')
@section('container')
@include('sweetalert::alert')


<div class="app-wrapper" style="margin-top:20px;">
    <div class="app-content pt-3 p-md-3 p-lg-4">
    <!-- Pills content -->

        <div class="container-xl">

                    <form style="margin: 10px 30px;" action="/role/{{$user->slug_user}}" method="POST">
                        @csrf
                        @method('put')
                        <!-- Name input -->
                        <div class="mb-3">
                            <label for="nama_user">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama_user') is invalid @enderror" id="nama_user" name="nama_user" placeholder="Nama Lengkap" required value="{{ old('nama_user', $user->nama_user) }}" readonly>
                            @error('nama_user')
                            <div class="ivalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <input type="hidden" class="form-control" id="slug_user" name="slug_user" value="{{ $user->slug_user }}" readonly>
                        </div>

                        <!-- Number input -->
                        <div class="mb3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is invalid
                            @enderror" id="email" name="email" placeholder="Email" required value="{{ old('email', $user->email) }}" readonly>
                        </div>

                        <div class="mb-3">
                            <input class="form-select  @error('role_id') is invalid @enderror" id="role_id" name="role_id"
                                aria-label="Pilih Role" required value="{{ old('role_id', $user->role_id) }}" readonly type="hidden">
                            </input>
                        </div>

                        <div class="mb-3">
                            <input type="hidden" class="form-select  @error('area_id') is invalid @enderror" id="area_id" name="area_id"
                                aria-label="Pilih Area Perubahan" required value="{{ old('area_id', $user->area_id) }}" readonly>
                            </input>
                        </div>

                        <div class="mb-3">
                            <input type="hidden" class="form-select  @error('provinsi_id') is invalid @enderror" id="provinsi_id" name="provinsi_id"
                                aria-label="Pilih Area Perubahan" required value="{{ old('provinsi_id', $user->provinsi_id) }}" readonly>
                            </input>
                        </div>

                        <div class="mb-3">
                            <input type="hidden" class="form-select  @error('kabkota_id') is invalid @enderror" id="kabkota_id" name="kabkota_id"
                                aria-label="Pilih Area Perubahan" required value="{{ old('kabkota_id', $user->kabkota_id) }}" readonly>
                            </input>
                        </div>


                        <!-- Password input -->
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
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

                        <!-- Submit button -->
                        <div class="d-flex flex-row-reverse">
                            <input type="submit" name="submit" value="Edit User" class="btn btn-primary" style="width: 200px; margin: 20px 0;">
                        </div>
                    </form>
                </div>

                <!-- Pills content -->
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
