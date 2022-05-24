@extends('layouts.app')

@section('content')
    <div class="email_register">
        <form method="POST" action="{{ route('register.main.registered') }}" class="p-5">
            @csrf
            <h2>会員登録</h2>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputFirstName">性（全角）</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="inputFirstName"
                        name="first_name" value="{{ old('first_name') }}" placeholder="例）山田" required>
                    @error('first_name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputLastName">名（全角）</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="inputLastName"
                        name="last_name" value="{{ old('last_name') }}" placeholder="例）彩" required>
                    @error('last_name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputFirstNameRuby">性（カナ）</label>
                    <input type="text" class="form-control @error('first_name_ruby') is-invalid @enderror"
                        id="inputFirstNameRuby" name="first_name_ruby" value="{{ old('first_name_ruby') }}"
                        placeholder="例）ヤマダ" required>
                    @error('first_name_ruby')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputLastNameRuby">名（カナ）</label>
                    <input type="text" class="form-control @error('last_name_ruby') is-invalid @enderror"
                        id="inputLastNameRuby" name="last_name_ruby" value="{{ old('last_name_ruby') }}" placeholder="例）彩"
                        required>
                    @error('last_name_ruby')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputLastNameRuby">電話番号（換金のため利用されます）</label>
                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                        id="inputLastNameRuby" name="phone_number" value="{{ old('phone_number') }}" placeholder="例）彩"
                        required>
                    @error('phone_number')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputNickname">ニックネーム</label>
                    <input type="text" class="form-control @error('nickname') is-invalid @enderror" id="inputNickname"
                        name="nickname" value="{{ old('nickname') }}" placeholder="アプリ内のユーザー名" required>
                    @error('nickname')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <p>性別</p>
                <div class="form-check">
                    <input class="form-check-input @error('sex') is-invalid @enderror" type="radio" name="sex"
                        id="inputSexMan" value="{{ old('男') }}">
                    <label class="form-check-label" for="inputSexMan">男</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input @error('sex') is-invalid @enderror" type="radio" name="sex"
                        id="inputSexWoman" value="{{ old('女') }}">
                    <label class="form-check-label" for="inputSexWoman">女</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input @error('sex') is-invalid @enderror" type="radio" name="sex"
                        id="inputSexNoAnswer" value="{{ old('無回答') }}">
                    <label class="form-check-label" for="inputSexNoAnswer">無回答</label>
                </div>
                @error('sex')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <p>相談したいor相談に乗る</p>
                <div class="form-check">
                    <input class="form-check-input @error('role_id') is-invalid @enderror" type="radio" name="role_id"
                        id="inputRoleId1" value="{{ old('1') }}">
                    <label class="form-check-label" for="inputRoleId1">相談したい</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input @error('role_id') is-invalid @enderror" type="radio" name="role_id"
                        id="inputRoleId2" value="{{ old('2') }}">
                    <label class="form-check-label" for="inputRoleId2">相談に乗る</label>
                </div>
                @error('role_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputCompany">会社</label>
                    <input type="text" class="form-control @error('company') is-invalid @enderror" id="inputCompany"
                        name="company" value="{{ old('company') }}" placeholder="例）株式会社○○" required>
                    @error('company')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputDepartment">部署</label>
                    <input type="text" class="form-control @error('department') is-invalid @enderror" id="inputDepartment"
                        name="department" value="{{ old('department') }}" placeholder="例）○○部署" required>
                    @error('department')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputWorkingPeriod">勤務年数</label>
                    <input type="number" class="form-control @error('working_period') is-invalid @enderror"
                        id="inputWorkingPeriod" name="working_period" value="{{ old('working_period') }}"
                        placeholder="例）4" required>
                    @error('working_period')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <input type="hidden" name="email_token" value="{{ $email_token }}">
            <button type="submit" class="email_register_next_button">送信</button>
        </form>
    </div>
@endsection
