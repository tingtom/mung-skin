<?php xhtmlHeaders(__FILE__, translate('Login') ); ?>
<body>
    <div class="grid-y grid-frame">
        <div class="cell shrink">
            <?php echo getNavBarHTML(); ?>
        </div>

        <div class="cell auto">
            <div class="grid-container grid-x align-center-middle">
                <form name="loginForm" id="loginForm" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="cell small-12 medium-4 large-6">
                    <input type="hidden" name="action" value="login"/>
                    <input type="hidden" name="view" value="postlogin"/>
                    <input type="hidden" name="postLoginQuery" value="<?php echo htmlspecialchars($_SERVER['QUERY_STRING']) ?>">

                    <div id="loginError" class="hidden alarm" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        Invalid username or password.
                    </div>

                    <div id="loginform">
                        <h1><?php echo ZM_WEB_TITLE . ' ' . translate('Login') ?></h1>
            
                        <label for="inputUsername" class="sr-only"><?php echo translate('Username') ?></label>
                        <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus />
            
                        <label for="inputPassword" class="sr-only"><?php echo translate('Password') ?></label>
                        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required />
            
                        <?php
                        if (defined('ZM_OPT_USE_GOOG_RECAPTCHA') 
                        && defined('ZM_OPT_GOOG_RECAPTCHA_SITEKEY') 
                        && defined('ZM_OPT_GOOG_RECAPTCHA_SECRETKEY')
                        && ZM_OPT_USE_GOOG_RECAPTCHA && ZM_OPT_GOOG_RECAPTCHA_SITEKEY && ZM_OPT_GOOG_RECAPTCHA_SECRETKEY)
                        {
                        echo "<div class='g-recaptcha'  data-sitekey='".ZM_OPT_GOOG_RECAPTCHA_SITEKEY."'></div>";
                        } ?>
            
                        <input class="btn btn-lg btn-primary btn-block" type="submit" value="<?php echo translate('Login') ?>"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
