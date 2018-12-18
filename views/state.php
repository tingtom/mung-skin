<?php
//
// ZoneMinder web run state view file, $Date$, $Revision$
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

if ( !canEdit( 'System' ) ) {
  $view = 'error';
  return;
}
?>
<div id="modalState" class="reveal" data-reveal>
  <form name="contentForm" id="contentForm" method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <input type="hidden" name="view" value="<?php echo $view ?>"/>
    <input type="hidden" name="action" value="state"/>
    <input type="hidden" name="apply" value="1"/>

    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>

    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="cell">
                <h2><?php echo translate('RunState') ?></h2>
            </div>

            <div class="cell">
                <label for="runState">Change State
                    <select id="runState" name="runState">
<?php if ( $running ) { ?>
                        <option value="stop" selected="selected"><?php echo translate('Stop') ?></option>
                        <option value="restart"><?php echo translate('Restart') ?></option>
<?php } else { ?>
                        <option value="start" selected="selected"><?php echo translate('Start') ?></option>
<?php }
$states = dbFetchAll( 'SELECT * FROM States' );
foreach ( $states as $state ) {
?>
                        <option value="<?php echo $state['Name'] ?>"><?php echo $state['Name'] ?></option>
<?php } ?>
                    </select>
                </label>
            </div>

            <div class="cell">
                <label for="newState"><?php echo translate('NewState') ?>
                    <input type="text" id="newState"/>
                </label>
            </div>

            <div class="cell grid-x align-justify align-middle">
                <div class="cell shrink text-left">
                    <p class="hide" id="pleasewait"><?php echo translate('PleaseWait') ?></p>
                </div>

                <div class="cell shrink">
                    <div class="grid-x grid-padding-x align-right">
                        <div class="cell shrink">
                            <button class="button" type="button" id="btnApply"><?php echo translate('Apply') ?></button>
                        </div>

                        <div class="cell shrink">
                            <button class="button" type="button" id="btnSave" disabled><?php echo translate('Save') ?></button>
                        </div>

                        <div class="cell shrink">
                            <button class="button" type="button" id="btnDelete" disabled><?php echo translate('Delete') ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </form>
</div> <!-- state -->
