@extends('admin.layout.apv')  

@section('content') 
<div class="container">
    <div class="col-md-12"> 
        <div class="form-appl"> 
            <h3>{{ $title }}</h3>                           
            <form class="form1" method="post" action="@if (isset($usern->id)) {{ route('users.update', ['id' => $usern->id]) }} @else {{ route('users.store') }} @endif" enctype="multipart/form-data"> 
                @csrf 
                @if(isset($usern->id))
                    {{-- Jika edit, tambahkan hidden input untuk metode POST --}}
                    {{-- Karena rute update menggunakan POST --}}
                @endif

                <div class="form-group col-md-12 mb-3">
                    <label for="">NAMA</label> 
                    <input class="form-control" type="text" name="name" placeholder="Enter Your Name" value="@if (isset($usern->id)) {{ $usern->name }} @else {{ old('name') }} @endif">
                    @error('nama') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">EMAIL</label> <!-- Mengubah label dari CONTENT menjadi EMAIL -->
                    <input class="form-control" type="email" name="email" placeholder="Enter Your Email" value="@if (isset($usern->id)) {{ $usern->email }} @else {{ old('email') }} @endif"  autocomplete="off" readonly onfocus="this.removeAttribute('readonly')" > <!-- Mengubah name dari content menjadi email -->
                    @error('email') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror 
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">PASSWORD</label> <!-- Mengubah label dari CONTENT menjadi PASSWORD -->
                    <input class="form-control" type="password" name="password" placeholder="Enter Password" autocomplete="off" readonly onfocus="this.removeAttribute('readonly')" > <!-- Menambahkan input untuk PASSWORD -->
                    @error('password') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>

               
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-danger" href="{{ route('users.index') }}">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection 

@push('js') 
<script type="text/javascript">
    function previewImage(input) { 
        if (input.files && input.files[0]) { 
            var reader = new FileReader(); 
            reader.onload = function(e) { 
                $("#imagePreview").css('background-image', 'url(' + e.target.result + ')'); 
                $("#imagePreview").hide(); 
                $("#imagePreview").fadeIn(700); 
            }
            reader.readAsDataURL(input.files[0]); 
        }
    }
</script>
@endpush 

<style>
    .avatar-upload { 
        position: relative;
        max-width: 205px; 
    }

    .avatar-upload .avatar-preview { 
        width: 67%; 
        height: 147px; 
        position: relative;
        border-radius: 3%; 
        border: 6px solid #F8F8F8; 
    }

    .avatar-upload .avatar-preview>div { 
        width: 100%; 
        height: 100%; 
        border-radius: 3%; 
        background-size: cover; 
        background-repeat: no-repeat; 
        background-position: center; 
    }
</style>
