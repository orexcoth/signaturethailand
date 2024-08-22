@extends('../backend/layout/side-menu')

@section('subhead')
    <title>Backend - {{$default_pagename}}</title>
@endsection

@section('subcontent')
<?php
// echo "<pre>";
// print_r($page_name);
// echo "</pre>";
?>
<div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
    <h2 class="mr-auto text-lg font-medium">{{$default_pagename}}</h2>
    <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
    </div>
</div>
<form method="post" action="{{ route('BN_users_add_action') }}" enctype="multipart/form-data">
    @csrf
    <div class="p-5">
        <div class="grid grid-cols-12 gap-x-5">

            <!-- Name Field -->
            <div class="col-span-12 xl:col-span-6">
                <div class="mt-3 xl:mt-0">
                    <label for="name" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control w-full" name="name" value="{{ old('name') }}" autocomplete="off" required />
                </div>
            </div>

            <!-- Email Field -->
            <div class="col-span-12 xl:col-span-6">
                <div class="mt-3 xl:mt-0">
                    <label for="email" class="form-label">อีเมล</label>
                    <input type="email" class="form-control w-full" name="email" value="{{ old('email') }}" autocomplete="off" required />
                </div>
            </div>

            <!-- Description Field -->
            <div class="col-span-12 xl:col-span-12 mt-3">
                <div class="mt-3 xl:mt-0">
                    <label for="description" class="form-label">รายละเอียด</label>
                    <input type="text" class="form-control" name="description" value="{{ old('description') }}" autocomplete="off">
                </div>
            </div>

            <!-- Role Field -->
            <div class="col-span-12 xl:col-span-6 mt-3">
                <div class="mt-3 xl:mt-0">
                    <label for="role" class="form-label">หน้าที่</label>
                    <select name="role" class="form-control w-full" required>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                        <option value="assistance" {{ old('role') == 'assistance' ? 'selected' : '' }}>Assistance</option>
                        <option value="editor" {{ old('role') == 'editor' ? 'selected' : '' }}>Editor</option>
                        <option value="marketing" {{ old('role') == 'marketing' ? 'selected' : '' }}>Marketing</option>
                    </select>
                </div>
            </div>

            <!-- Password Field -->
            <div class="col-span-12 xl:col-span-6 mt-3">
                <div class="mt-3 xl:mt-0">
                    <label for="password" class="form-label">พาสเวิร์ด</label>
                    <input type="password" class="form-control w-full" name="password" required />
                </div>
            </div>

            <!-- Rate Download Field -->
            <div class="col-span-12 xl:col-span-6 mt-3">
                <div class="mt-3 xl:mt-0">
                    <label for="rate_download" class="form-label">ดาวน์โหลด</label>
                    <input type="number" class="form-control w-full" name="rate_download" value="{{ old('rate_download', 0.00) }}" min="0.00" max="100.00" step="0.01" autocomplete="off" />
                </div>
            </div>

            <!-- Rate Preorder Field -->
            <div class="col-span-12 xl:col-span-6 mt-3">
                <div class="mt-3 xl:mt-0">
                    <label for="rate_preorder" class="form-label">สั่งออกแบบ</label>
                    <input type="number" class="form-control w-full" name="rate_preorder" value="{{ old('rate_preorder', 0.00) }}" min="0.00" max="100.00" step="0.01" autocomplete="off" />
                </div>
            </div>

            <!-- Social Media Fields -->
            <div class="col-span-12 xl:col-span-6 mt-3">
                <div class="mt-3 xl:mt-0">
                    <label for="facebook" class="form-label">Facebook</label>
                    <input type="url" class="form-control w-full" name="facebook" value="{{ old('facebook') }}" autocomplete="off" />
                </div>
            </div>

            <div class="col-span-12 xl:col-span-6 mt-3">
                <div class="mt-3 xl:mt-0">
                    <label for="line" class="form-label">Line</label>
                    <input type="text" class="form-control w-full" name="line" value="{{ old('line') }}" autocomplete="off" />
                </div>
            </div>

            <div class="col-span-12 xl:col-span-6 mt-3">
                <div class="mt-3 xl:mt-0">
                    <label for="ig" class="form-label">Instagram</label>
                    <input type="text" class="form-control w-full" name="ig" value="{{ old('ig') }}" autocomplete="off" />
                </div>
            </div>

            <div class="col-span-12 xl:col-span-6 mt-3">
                <div class="mt-3 xl:mt-0">
                    <label for="twitter" class="form-label">Twitter</label>
                    <input type="text" class="form-control w-full" name="twitter" value="{{ old('twitter') }}" autocomplete="off" />
                </div>
            </div>

            <!-- Photo Field -->
            <div class="col-span-12 xl:col-span-6 mt-3">
                <div class="mt-3 xl:mt-0">
                    <label for="photo" class="form-label">รูปโปรไฟล์</label>
                    <input type="file" class="form-control w-full" name="photo" accept="image/*" />
                </div>
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

</script>


@endsection