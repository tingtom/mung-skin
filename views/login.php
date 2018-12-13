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

                    <div id="loginError" class="hide callout alert" data-closable>
                        <p>Invalid username or password.</p>
                        <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div id="loginform">
                        <h1><?php echo ZM_WEB_TITLE . ' ' . translate('Login') ?></h1>
            
                        <label for="inputUsername">
                            <?php echo translate('Username') ?>
                            <input type="text" id="inputUsername" name="username" placeholder="Username" required autofocus />
                        </label>
            
                        <label for="inputPassword">
                            <?php echo translate('Password') ?>
                            <input type="password" id="inputPassword" name="password" placeholder="Password" required />
                        </label>
            
                        <?php
                            if (defined('ZM_OPT_USE_GOOG_RECAPTCHA') 
                            && defined('ZM_OPT_GOOG_RECAPTCHA_SITEKEY') 
                            && defined('ZM_OPT_GOOG_RECAPTCHA_SECRETKEY')
                            && ZM_OPT_USE_GOOG_RECAPTCHA && ZM_OPT_GOOG_RECAPTCHA_SITEKEY && ZM_OPT_GOOG_RECAPTCHA_SECRETKEY)
                            {
                                echo "<div class='g-recaptcha'  data-sitekey='".ZM_OPT_GOOG_RECAPTCHA_SITEKEY."'></div>";
                            }
                        ?>
            
                        <input type="submit" class="success button" value="<?php echo translate('Login') ?>"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
