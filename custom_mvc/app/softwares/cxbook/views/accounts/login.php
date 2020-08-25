<?php build('content')?>
<div class="form-content">
    <h1 class="">Sign In</h1>
    <p>to access <?php echo appName()?></p>
    <form class="text-left" method="post"
    action="<?php echo appRequest('accountLogin/login')?>">
        <div class="form">
            <?php Flash::show()?>
            <div id="email-field" class="field-wrapper input">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle>
                <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                <?php
                    Form::text('key' , '' , [
                        'id' => 'key',
                        'class'=> 'form-control',
                        'placeholder' => 'Email'
                    ])
                ?>
            </div>
            <div id="password-field" class="field-wrapper input mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                <?php
                    Form::password('password' , null , [
                        'id' => 'password',
                        'class'=> 'form-control',
                        'placeholder' => 'Password'
                    ])
                ?>
            </div>
            <div class="d-sm-flex justify-content-between">
                <div class="field-wrapper toggle-pass">
                    <p class="d-inline-block">Show Password</p>
                    <label class="switch s-primary">
                        <input type="checkbox" id="toggle-password" class="d-none">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="field-wrapper">
                    <button type="submit" class="btn btn-primary" value="">Login</button>
                </div>
            </div>

        </div>
        <p class="signup-link" style="margin-top:30px">Don't Have <?php echo appName()?> account <a href="<?php echo appRequest('accounts/create')?>">Sign Up</a> </p>
    </form>
    <p class="terms-conditions">© 2019-<?php echo date('Y')?> All Rights Reserved. <a href="index.html"><?php echo  appName()?></a> is a product of
      <a href="https://chromaticsoftwares.com/"><?php echo SITE_NAME?></a>. 
    <a href="javascript:void(0);">Cookie Preferences</a>, <a href="javascript:void(0);">Privacy</a>, and <a href="javascript:void(0);">Terms</a>.</p>
</div>

<?php endbuild()?>

<?php appGrab('templates/auth_tmp')?>
