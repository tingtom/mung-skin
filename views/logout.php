<?php
//
// ZoneMinder web logout view file, $Date$, $Revision$
// Copyright (C) 2001-2008 Philip Coombes
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
//

//$focusWindow = true;

//xhtmlHeaders(__FILE__, translate('Logout') );
  global $user;
  global $CLANG;
?>

<div id="modalLogout" class="reveal" data-reveal>
    <form name="contentForm" id="contentForm" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input type="hidden" name="action" value="logout"/>
        <input type="hidden" name="view" value="login"/>

        <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>

        <div class="grid-x">
            <div class="cell">
                <h2><?php echo ZM_WEB_TITLE . ' ' . translate('Logout') ?></h2>
            </div>

            <div class="cell text-center">
                <p><?php echo sprintf( $CLANG['CurrentLogin'], $user['Username'] ) ?></p>
            </div>

            <div class="cell">
                <div class="grid-x grid-padding-x align-right">
                    <div class="cell shrink">
                        <input class="button" type="submit" value="<?php echo translate('Logout') ?>"/>
                    </div>

<?php if ( ZM_USER_SELF_EDIT ) { ?>
                    <div class="cell shrink">
                        <input class="button" type="button" value="<?php echo translate('Config') ?>" onclick="createPopup( '?view=user&amp;uid=<?php echo $user['Id'] ?>', 'zmUser', 'user' );"/>
                    </div>
<?php } ?>

                    <div class="cell shrink">
                        <input data-close class="button" type="button" value="<?php echo translate('Cancel') ?>"/>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>