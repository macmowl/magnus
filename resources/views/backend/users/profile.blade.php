@extends('admin.admin_master')

@section('admin')
    <div class="col-12">
        <div class="box box-inverse bg-img" style="background-image: url(../images/gallery/full/1.jpg);" data-overlay="2">
          <div class="flexbox px-20 pt-20">
            <label class="toggler toggler-danger text-white">
              <input type="checkbox">
              <i class="fa fa-heart"></i>
            </label>
            <a href="{{ route('profile.edit') }}"><i class="fa fa-edit text-white"></i></a>
          </div>

          <div class="box-body text-center pb-50">
            <a href="#">
              <img class="avatar avatar-xxl avatar-bordered" src="{{ Auth::user()->profile_photo_path != null
              ? asset('storage/' . Auth::user()->profile_photo_path)
              : asset('storage/profile-photos/default_avatar.png')
      }}" alt="">
            </a>
            <h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">{{ $user->name }}</a></h4>
            <h6 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">{{ $user->role }}</a></h6>
          </div>

          <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
            <li>
              <span class="font-size-20">{{ $user->mobile ?? 'No mobile' }}</span>
            </li>
            <li>
              <span class="font-size-20">{{ $user->address ?? 'No address' }}</span>
            </li>
            <li>
              <span class="font-size-20">{{ $user->gender ?? 'No gender' }}</span>
            </li>
          </ul>
        </div>
    </div>
@endsection
