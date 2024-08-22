@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
        </div>
    </div>

    <form method="post" action="{{ route('BN_users_edit_action') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user" value="{{ $user->id }}" />
        
        <div class="p-5">
            <div class="grid grid-cols-12 gap-x-5">

                <!-- Name Field -->
                <div class="col-span-12 xl:col-span-6">
                    <div class="mt-3 xl:mt-0">
                        <label for="name" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control w-full" name="name" value="{{ $user->name }}" autocomplete="off" required />
                    </div>
                </div>

                <!-- Email Field -->
                <div class="col-span-12 xl:col-span-6">
                    <div class="mt-3 xl:mt-0">
                        <label for="email" class="form-label">อีเมล</label>
                        <input type="email" class="form-control w-full" name="email" value="{{ $user->email }}" autocomplete="off" required />
                    </div>
                </div>

                <!-- Description Field -->
                <div class="col-span-12 xl:col-span-12 mt-3">
                    <div class="mt-3 xl:mt-0">
                        <label for="description" class="form-label">รายละเอียด</label>
                        <input type="text" class="form-control w-full" name="description" value="{{ $user->description }}" autocomplete="off">
                    </div>
                </div>

                <!-- Role Field -->
                <div class="col-span-12 xl:col-span-6 mt-3">
                    <div class="mt-3 xl:mt-0">
                        <label for="role" class="form-label">หน้าที่</label>
                        <select name="role" class="form-control w-full" required>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager</option>
                            <option value="assistance" {{ $user->role == 'assistance' ? 'selected' : '' }}>Assistance</option>
                            <option value="editor" {{ $user->role == 'editor' ? 'selected' : '' }}>Editor</option>
                            <option value="marketing" {{ $user->role == 'marketing' ? 'selected' : '' }}>Marketing</option>
                        </select>
                    </div>
                </div>

                <!-- Rate Download Field -->
                <div class="col-span-12 xl:col-span-6 mt-3">
                    <div class="mt-3 xl:mt-0">
                        <label for="rate_download" class="form-label">ดาวน์โหลด</label>
                        <input type="number" class="form-control w-full" name="rate_download" value="{{ number_format($user->rate_download, 2) }}" min="0.00" max="100.00" step="0.01" autocomplete="off" />
                    </div>
                </div>

                <!-- Rate Preorder Field -->
                <div class="col-span-12 xl:col-span-6 mt-3">
                    <div class="mt-3 xl:mt-0">
                        <label for="rate_preorder" class="form-label">สั่งออกแบบ</label>
                        <input type="number" class="form-control w-full" name="rate_preorder" value="{{ number_format($user->rate_preorder, 2) }}" min="0.00" max="100.00" step="0.01" autocomplete="off" />
                    </div>
                </div>

                <!-- Social Media Fields -->
                <div class="col-span-12 xl:col-span-6 mt-3">
                    <div class="mt-3 xl:mt-0">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="url" class="form-control w-full" name="facebook" value="{{ $user->facebook }}" autocomplete="off" />
                    </div>
                </div>

                <div class="col-span-12 xl:col-span-6 mt-3">
                    <div class="mt-3 xl:mt-0">
                        <label for="line" class="form-label">Line</label>
                        <input type="text" class="form-control w-full" name="line" value="{{ $user->line }}" autocomplete="off" />
                    </div>
                </div>

                <div class="col-span-12 xl:col-span-6 mt-3">
                    <div class="mt-3 xl:mt-0">
                        <label for="ig" class="form-label">Instagram</label>
                        <input type="text" class="form-control w-full" name="ig" value="{{ $user->ig }}" autocomplete="off" />
                    </div>
                </div>

                <div class="col-span-12 xl:col-span-6 mt-3">
                    <div class="mt-3 xl:mt-0">
                        <label for="twitter" class="form-label">Twitter</label>
                        <input type="text" class="form-control w-full" name="twitter" value="{{ $user->twitter }}" autocomplete="off" />
                    </div>
                </div>

                <!-- Photo Field -->
                <div class="col-span-12 xl:col-span-6 mt-3">
                    <div class="mt-3 xl:mt-0">
                        <label for="photo" class="form-label">รูปโปรไฟล์</label>
                        <input type="file" class="form-control w-full" name="photo" accept="image/*" />
                    </div>
                    @if(isset($user->photo))
                    <div class="sm:grid grid-cols-1 gap-1 mt-5">
                        <div class="">
                            <label for="" class="form-label">รูปภาพปัจจุบัน</label>
                            <image width="150" src="{{ asset($user->photo) }}">
                        </div>
                    </div>
                    @endif
                </div>

            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-4">
                <button type="submit" class="btn btn-primary w-20 mr-auto">บันทึก</button>
            </div>
        </div>
    </form>
@endsection

@section('script')
<script>
    // Custom scripts can be added here if needed
</script>
@endsection
