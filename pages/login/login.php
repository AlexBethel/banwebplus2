<?php
require_once(dirname(__FILE__)."/../../resources/globals.php");
require_once(dirname(__FILE__)."/../../resources/common_functions.php");

// checks the session for a logged in user
// @retval the user object or null
function get_logged_in() {
    global $global_user;

    if (!isset($_SESSION['loggedin']) || !isset($_SESSION['username']) || !isset($_SESSION['last_activity']) || !isset($_SESSION['crypt_password'])) {
        return NULL;
    }
    if (get_session_expired()) {
        $_POST['session_expired'] = 'Your session has expired';
        return NULL;
    }
    $_SESSION['last_activity'] = time();
    $o_user = new user($_SESSION['username'], NULL, urldecode($_SESSION['crypt_password']));
    if ($o_user->exists_in_db()) {
        $global_user = $o_user;
        return $o_user;
    }
    return NULL;
}

function get_session_expired() {
    $time_before_timeout = 10; // minutes
    if (isset($_SESSION['time_before_page_expires']))
        if ((int)$_SESSION['time_before_page_expires'] != 0)
            $time_before_timeout = (int)$_SESSION['time_before_page_expires'];
    if ($time_before_timeout < 0)
        return FALSE;
    if ((time()-$_SESSION['last_activity'])/60 > $time_before_timeout)
        return TRUE;
    else
        return FALSE;
}

// returns a string for the login page
function draw_login_page($session_expired_message) {

    ob_start();
?>
    <script type="text/javascript">dont_check_session_expired = true;</script>

    <div style='display:inline-block; margin:0 15px 0 0; vertical-align:middle;'>
        <span id='login_form_guest'>
            <input type='hidden' name='username' value='guest' />
            <input type='hidden' name='password' value='guest' />
            <span style='color:red;'>:</span>
            <span class='highlight_link' onclick='send_ajax_call_from_form("/pages/login/login_ajax.php","login_form_guest");'>Login As Guest</span>
            <span style='color:red;'>:</span>
        </span><br />
    </div>

    <div style='display:inline-block; margin:0 15px 0 0; vertical-align:middle;'>
        <span style='color:gray; font-style:italic;'>or</span>
    </div>

    <div style='display:inline-block; margin:0 0 0 0; vertical-align:middle;'>
        <form id='login_form'>
            <label class='errors'><?php echo $session_expired_message; ?></label><br />
            <label name='username'>Username</label>
            <input type='textbox' size='20' name='username' disabled='1'><br />
            <label name='password'>Password</label>
            <input type='password' size='20' name='password' disabled='1' onkeydown='if (event.which == 13) { $(this).parent().find("input[value=Submit]").click(); };'><br />
            <div style='float:right;'>
                <input type='button' value='Submit' disabled='1' onclick='send_ajax_call_from_form("/pages/login/login_ajax.php",$(this).parent().parent().prop("id"));' />
            </div><br />
            <div style='color:gray; font-size:12px;'>Non-guest accounts are disabled on this instance.</div>
        </form>
        <br />
        <!--
             <span>
             <span id="create_form" style="min-width:">
             <input type="hidden" name="draw_create_user_page" value="1">
             <a href="#" class="black_link" onclick="send_ajax_call_from_form('/pages/users/ajax.php','create_form');">Create User</a>,
             </span>
             <span id="password_form">
             <input type="hidden" name="draw_forgot_password_page" value="1" />
             <a href="#" class="black_link" onclick="send_ajax_call_from_form('/pages/users/ajax.php','password_form');">Forgot Password</a>
             </span>
             </span>
        -->
    </div>
    <!-- I'm sticking this here from observations of the generated
    code; it's not the "right" way to generate this from the PHP, but
    it'll do. -->
    </td></tr><tr><td>
    <a class="highlight_link" href="https://discord.gg/QsZcD3RdJT">Discord server</a> &bullet; <a class="highlight_link" href="https://github.com/alexbethel/banwebplus2">Source code</a>
    <?php
    $s_page = ob_get_contents();
    ob_end_clean();

    $a_page[] = draw_page_head();
    $a_page[] = $s_page;
    $a_page[] = draw_page_foot();
    return implode("\n", $a_page);
    }

    function check_logged_in() {
        global $session_expired;
        my_session_start();

        $o_user = get_logged_in();
        if ($o_user === NULL)
            return FALSE;
        return TRUE;
    }

    ?>
