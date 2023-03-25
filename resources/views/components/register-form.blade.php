@csrf
<p class="register-title">{{$title}}登録</p>
<div class="validate-error-message-area">
    @if(count($errors) > 0)
    @foreach($errors->all() as $error)
    <p class="validate-error-message">※{{$error}}</p>
    @endforeach
    @endif
</div>
<dl class="register-dl">
    <dt class="register-dt"><i class="fa-solid fa-user"></i></dt>
    <dd class="register-dd"><input type="text" name="{{$name}}" placeholder="{{$placeholder}}"
            value="{{old($name)}}"></dd>
</dl>
<dl class="register-dl">
    <dt class="register-dt"><i class="fa-solid fa-envelope"></i></dt>
    <dd class="register-dd"><input type="email" name="email" placeholder="Email" value="{{old('email')}}"></dd>
</dl>
<dl class="register-dl">
    <dt class="register-dt"><i class="fa-solid fa-lock"></i></dt>
    <dd class="register-dd"><input type="passsword" name="password" placeholder="Password" value="{{old('password')}}">
    </dd>
</dl>
<div class="register-btn-area">
    <button class="registration-btn">登録</button>
</div>
