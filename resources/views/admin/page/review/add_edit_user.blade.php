@extends('admin.layout.apv')  

@section('content') 
<div class="container">
    <div class="col-md-12"> 
        <div class="form-appl"> 
            <h3>{{ $title }}</h3>                           
            <form class="form1" method="post" action="@if (isset($review->id)) {{ route('review.update', ['id' => $review->id]) }} @else {{ route('review.store') }} @endif" enctype="multipart/form-data"> 
                @csrf 
                @if(isset($review->id))
                    {{-- Jika edit, tambahkan hidden input untuk metode POST --}}
                    {{-- Karena rute update menggunakan POST --}}
                @endif

                <div class="form-group col-md-12 mb-3">
                    <label for="">NAMA</label> 
                    <input class="form-control" type="text" name="nama" placeholder="Enter Your Name" value="@if (isset($review->id)) {{ $review->nama }} @else {{ old('nama') }} @endif">
                    @error('nama') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-3">
                    <label for="">CONTENT</label> 
                    <input class="form-control" type="text" name="content" placeholder="Enter Content" value="@if (isset($review->id)) {{ $review->content }} @else {{ old('content') }} @endif">
                    @error('content') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>

                <div class="form-group col-md-12 mb-5"> 
                    <label for="">GAMBAR</label> 
                    <div class="avatar-upload">
                        <div>
                            <input type='file' id="imageUpload" name="foto" accept=".png, .jpg, .jpeg" onchange="previewImage(this)" />
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview"> {{-- Div untuk menampilkan preview foto yang diupload --}}
                            <div id="imagePreview" style="@if (isset($review->id) && $review->foto != '') background-image:url('{{ url('/') }}/uploads/{{ $review->foto }}')@else background-image: url('{{ url('/img/avatar.png') }}') @endif"></div> {{-- Div dengan ID 'imagePreview' yang menampilkan foto pengguna jika sedang mengedit dan memiliki foto, atau gambar default jika tidak --}}
                        </div>
                    </div>
                    @error('foto') 
                        <div class="text-danger">{{ $message }}</div> 
                    @enderror
                </div>

                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-danger" href="{{ route('review.index') }}">Cancel</a>
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
