<?php
//
// ZoneMinder web bandwidth view file, $Date$, $Revision$
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

$newBandwidth = $_COOKIE['zmBandwidth'];

if ( $user && !empty($user['MaxBandwidth']) )
{
    if ( $user['MaxBandwidth'] == "low" )
    {
        unset( $bandwidth_options['high'] );
        unset( $bandwidth_options['medium'] );
    }
    elseif ( $user['MaxBandwidth'] == "medium" )
    {
        unset( $bandwidth_options['high'] );
    }
}
?>

<div id="modalBandwidth" class="reveal" data-reveal>
    <form name="contentForm" id="contentForm" method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input type="hidden" name="view" value="none"/>
        <input type="hidden" name="action" value="bandwidth"/>

        <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>

        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell">
                    <h2><?php echo translate('Bandwidth') ?></h2>
                </div>

                <div class="cell">
                    <label for="newBandwidth"><?php echo translate('SetNewBandwidth') ?>
                        <select id="newBandwidth" name="newBandwidth">

<?php foreach ( $bandwidth_options as $contentValue => $contentText ) { ?>
    <option value="<?php echo $contentValue ?>"<?php if ( $newBandwidth == $contentValue ) { ?> selected="selected"<?php } ?>><?php echo $contentText ?></option>
<?php } ?>
                        
                        </select>
                    </label>
                </div>

                <div class="cell grid-x align-right">
                    <button class="button" type="button" id="btnApplyBandwidth"><?php echo translate('Save') ?></button>
                </div>
            </div>
        </div>
    </form>
</div>